/*!
 * CarouselFeature - フロントエンド用JavaScript
 * クラシックJavaScript (ES5準拠)
 * PREG_ERROR対策：正規表現を使わない実装
 */

(function() {
    'use strict';

    // カルーセルクラス
    function CarouselFeature(container, config) {
        this.container = container;
        this.config = this.mergeConfig(config);
        this.currentSlide = 0;
        this.totalSlides = 0;
        this.isAutoPlaying = false;
        this.autoPlayTimer = null;
        this.progressTimer = null;
        this.isTransitioning = false;
        this.touchStartX = 0;
        this.touchEndX = 0;
        this.isDragging = false;

        this.init();
    }

    // デフォルト設定
    CarouselFeature.prototype.defaultConfig = {
        displayCount: 5,
        autoPlay: true,
        autoPlayInterval: 5000,
        showNavigation: true,
        showIndicators: true,
        enableTouchSwipe: true,
        enableKeyboardNav: true,
        transitionEffect: 'slide',
        transitionDuration: 500
    };

    // 設定をマージ
    CarouselFeature.prototype.mergeConfig = function(config) {
        var merged = {};
        for (var key in this.defaultConfig) {
            merged[key] = this.defaultConfig[key];
        }
        if (config) {
            for (var key in config) {
                merged[key] = config[key];
            }
        }
        return merged;
    };

    // 初期化
    CarouselFeature.prototype.init = function() {
        if (!this.container) {
            console.warn('CarouselFeature: コンテナが見つかりません');
            return;
        }

        this.setupElements();
        this.setupEvents();
        this.start();
    };

    // 要素の設定
    CarouselFeature.prototype.setupElements = function() {
        this.track = this.container.querySelector('#carouselTrack');
        this.slides = this.container.querySelectorAll('.carousel-slide');
        this.prevBtn = this.container.querySelector('#carouselPrev');
        this.nextBtn = this.container.querySelector('#carouselNext');
        this.indicators = this.container.querySelectorAll('.carousel-indicator');
        this.playPauseBtn = this.container.querySelector('#carouselPlayPause');
        this.progressBar = this.container.querySelector('#carouselProgressBar');
        this.statusElement = this.container.querySelector('#carouselStatus');

        this.totalSlides = this.slides.length;

        // 表示枚数制限
        if (this.config.displayCount > 0 && this.config.displayCount < this.totalSlides) {
            for (var i = this.config.displayCount; i < this.totalSlides; i++) {
                this.slides[i].style.display = 'none';
            }
            this.totalSlides = Math.min(this.totalSlides, this.config.displayCount);
        }

        // トランジション効果の設定
        if (this.config.transitionEffect === 'fade') {
            this.container.classList.add('fade');
        }

        // トランジション時間の設定
        if (this.track) {
            this.track.style.transitionDuration = this.config.transitionDuration + 'ms';
        }
    };

    // イベントの設定
    CarouselFeature.prototype.setupEvents = function() {
        var self = this;

        // ナビゲーションボタン
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', function() {
                self.prevSlide();
            });
        }

        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', function() {
                self.nextSlide();
            });
        }

        // インジケーター
        for (var i = 0; i < this.indicators.length; i++) {
            (function(index) {
                self.indicators[index].addEventListener('click', function() {
                    self.goToSlide(index);
                });
            })(i);
        }

        // 自動再生制御
        if (this.playPauseBtn) {
            this.playPauseBtn.addEventListener('click', function() {
                self.toggleAutoPlay();
            });
        }

        // キーボードナビゲーション
        if (this.config.enableKeyboardNav) {
            document.addEventListener('keydown', function(e) {
                if (self.isElementInViewport(self.container)) {
                    if (e.keyCode === 37) { // 左矢印
                        e.preventDefault();
                        self.prevSlide();
                    } else if (e.keyCode === 39) { // 右矢印
                        e.preventDefault();
                        self.nextSlide();
                    } else if (e.keyCode === 32) { // スペース
                        e.preventDefault();
                        self.toggleAutoPlay();
                    }
                }
            });
        }

        // タッチイベント
        if (this.config.enableTouchSwipe) {
            this.setupTouchEvents();
        }

        // マウスホバーで自動再生停止
        this.container.addEventListener('mouseenter', function() {
            if (self.isAutoPlaying) {
                self.pauseAutoPlay();
            }
        });

        this.container.addEventListener('mouseleave', function() {
            if (self.config.autoPlay && !self.isAutoPlaying) {
                self.startAutoPlay();
            }
        });

        // ウィンドウのフォーカス/ブラー
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                self.pauseAutoPlay();
            } else if (self.config.autoPlay) {
                self.startAutoPlay();
            }
        });

        // リサイズイベント
        window.addEventListener('resize', function() {
            self.updateLayout();
        });
    };

    // タッチイベントの設定
    CarouselFeature.prototype.setupTouchEvents = function() {
        var self = this;

        this.container.addEventListener('touchstart', function(e) {
            self.touchStartX = e.touches[0].clientX;
            self.isDragging = true;
            if (self.isAutoPlaying) {
                self.pauseAutoPlay();
            }
        }, { passive: true });

        this.container.addEventListener('touchmove', function(e) {
            if (!self.isDragging) return;
            self.touchEndX = e.touches[0].clientX;
        }, { passive: true });

        this.container.addEventListener('touchend', function(e) {
            if (!self.isDragging) return;
            self.isDragging = false;

            var deltaX = self.touchStartX - self.touchEndX;
            var threshold = 50; // スワイプの最小距離

            if (Math.abs(deltaX) > threshold) {
                if (deltaX > 0) {
                    self.nextSlide();
                } else {
                    self.prevSlide();
                }
            }

            // 自動再生を再開
            if (self.config.autoPlay) {
                setTimeout(function() {
                    self.startAutoPlay();
                }, 1000);
            }
        }, { passive: true });
    };

    // カルーセル開始
    CarouselFeature.prototype.start = function() {
        if (this.totalSlides <= 1) {
            this.hideControls();
            return;
        }

        this.updateSlide();
        
        if (this.config.autoPlay) {
            this.startAutoPlay();
        }
    };

    // 前のスライド
    CarouselFeature.prototype.prevSlide = function() {
        if (this.isTransitioning) return;

        this.currentSlide = this.currentSlide === 0 
            ? this.totalSlides - 1 
            : this.currentSlide - 1;
        
        this.updateSlide();
    };

    // 次のスライド
    CarouselFeature.prototype.nextSlide = function() {
        if (this.isTransitioning) return;

        this.currentSlide = this.currentSlide === this.totalSlides - 1 
            ? 0 
            : this.currentSlide + 1;
        
        this.updateSlide();
    };

    // 指定スライドに移動
    CarouselFeature.prototype.goToSlide = function(index) {
        if (this.isTransitioning || index === this.currentSlide) return;
        
        this.currentSlide = index;
        this.updateSlide();
    };

    // スライドを更新
    CarouselFeature.prototype.updateSlide = function() {
        if (!this.track) return;

        this.isTransitioning = true;
        var self = this;

        // トランジション効果に応じて処理を分岐
        if (this.config.transitionEffect === 'fade') {
            this.updateFadeSlide();
        } else {
            this.updateSlidePosition();
        }

        // インジケーターを更新
        this.updateIndicators();

        // ステータスを更新
        this.updateStatus();

        // トランジション完了後の処理
        setTimeout(function() {
            self.isTransitioning = false;
        }, this.config.transitionDuration);
    };

    // スライド位置を更新（スライド効果）
    CarouselFeature.prototype.updateSlidePosition = function() {
        var translateX = -this.currentSlide * 100;
        this.track.style.transform = 'translateX(' + translateX + '%)';
    };

    // フェード効果でスライドを更新
    CarouselFeature.prototype.updateFadeSlide = function() {
        for (var i = 0; i < this.slides.length; i++) {
            this.slides[i].classList.remove('active');
        }
        if (this.slides[this.currentSlide]) {
            this.slides[this.currentSlide].classList.add('active');
        }
    };

    // インジケーターを更新
    CarouselFeature.prototype.updateIndicators = function() {
        for (var i = 0; i < this.indicators.length; i++) {
            this.indicators[i].classList.remove('active');
        }
        if (this.indicators[this.currentSlide]) {
            this.indicators[this.currentSlide].classList.add('active');
        }
    };

    // ステータスを更新
    CarouselFeature.prototype.updateStatus = function() {
        if (this.statusElement) {
            this.statusElement.textContent = 'カルーセル: ' + 
                this.totalSlides + '件中' + (this.currentSlide + 1) + '件目を表示';
        }
    };

    // 自動再生を開始
    CarouselFeature.prototype.startAutoPlay = function() {
        if (this.totalSlides <= 1 || this.isAutoPlaying) return;

        this.isAutoPlaying = true;
        this.updatePlayPauseButton();

        var self = this;
        this.autoPlayTimer = setTimeout(function() {
            self.nextSlide();
            if (self.isAutoPlaying) {
                self.startAutoPlay();
            }
        }, this.config.autoPlayInterval);

        // プログレスバーアニメーション
        if (this.progressBar) {
            this.progressBar.style.transition = 'width ' + this.config.autoPlayInterval + 'ms linear';
            this.progressBar.style.width = '100%';
        }
    };

    // 自動再生を停止
    CarouselFeature.prototype.pauseAutoPlay = function() {
        if (!this.isAutoPlaying) return;

        this.isAutoPlaying = false;
        this.updatePlayPauseButton();

        if (this.autoPlayTimer) {
            clearTimeout(this.autoPlayTimer);
            this.autoPlayTimer = null;
        }

        // プログレスバーをリセット
        if (this.progressBar) {
            this.progressBar.style.transition = 'none';
            this.progressBar.style.width = '0%';
        }
    };

    // 自動再生をトグル
    CarouselFeature.prototype.toggleAutoPlay = function() {
        if (this.isAutoPlaying) {
            this.pauseAutoPlay();
        } else {
            this.startAutoPlay();
        }
    };

    // 再生/停止ボタンを更新
    CarouselFeature.prototype.updatePlayPauseButton = function() {
        if (!this.playPauseBtn) return;

        var icon = this.playPauseBtn.querySelector('i');
        if (icon) {
            if (this.isAutoPlaying) {
                icon.className = 'fa fa-pause';
                this.playPauseBtn.setAttribute('aria-label', '自動再生を停止');
                this.playPauseBtn.setAttribute('title', '自動再生を停止');
            } else {
                icon.className = 'fa fa-play';
                this.playPauseBtn.setAttribute('aria-label', '自動再生を開始');
                this.playPauseBtn.setAttribute('title', '自動再生を開始');
            }
        }
    };

    // コントロールを非表示
    CarouselFeature.prototype.hideControls = function() {
        if (this.prevBtn) this.prevBtn.style.display = 'none';
        if (this.nextBtn) this.nextBtn.style.display = 'none';
        
        var indicatorsContainer = this.container.querySelector('.carousel-indicators');
        if (indicatorsContainer) indicatorsContainer.style.display = 'none';
        
        var controlsContainer = this.container.querySelector('.carousel-controls');
        if (controlsContainer) controlsContainer.style.display = 'none';
    };

    // レイアウトを更新
    CarouselFeature.prototype.updateLayout = function() {
        // リサイズ時の処理
        this.updateSlide();
    };

    // 要素がビューポート内にあるかチェック
    CarouselFeature.prototype.isElementInViewport = function(element) {
        var rect = element.getBoundingClientRect();
        return rect.top >= 0 && rect.bottom <= window.innerHeight;
    };

    // 破棄
    CarouselFeature.prototype.destroy = function() {
        this.pauseAutoPlay();
        
        if (this.autoPlayTimer) {
            clearTimeout(this.autoPlayTimer);
        }
        
        if (this.progressTimer) {
            clearTimeout(this.progressTimer);
        }
    };

    // DOM読み込み完了時の初期化
    function initCarousels() {
        var containers = document.querySelectorAll('.carousel-feature-section');
        
        for (var i = 0; i < containers.length; i++) {
            var container = containers[i];
            var configData = container.getAttribute('data-config');
            var config = {};
            
            if (configData) {
                try {
                    config = JSON.parse(configData);
                } catch (e) {
                    console.warn('CarouselFeature: 設定の解析に失敗しました', e);
                }
            }
            
            new CarouselFeature(container, config);
        }
    }

    // DOM読み込み完了を待つ
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCarousels);
    } else {
        initCarousels();
    }

    // グローバルに公開（必要に応じて）
    window.CarouselFeature = CarouselFeature;

})();