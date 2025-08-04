/*!
 * CarouselFeature - 管理画面設定用JavaScript
 * クラシックJavaScript (ES5準拠)
 */

(function() {
    'use strict';

    var CarouselAdminConfig = {
        config: {
            csrfToken: '',
            urls: {
                preview: '/admin/carousel_feature/config/preview',
                validate: '/admin/carousel_feature/config/validate',
                reset: '/admin/carousel_feature/config/reset'
            }
        },

        elements: {
            form: null,
            previewContainer: null,
            ranges: {},
            resetBtn: null,
            validateBtn: null,
            refreshPreviewBtn: null
        },

        previewTimer: null,
        
        init: function() {
            this.config.csrfToken = this.getCsrfToken();
            this.setupElements();
            this.setupEvents();
            this.initializePreview();
        },

        setupElements: function() {
            this.elements.form = document.getElementById('configForm');
            this.elements.previewContainer = document.getElementById('carouselPreview');
            this.elements.resetBtn = document.getElementById('resetConfig');
            this.elements.validateBtn = document.getElementById('validateConfig');
            this.elements.refreshPreviewBtn = document.getElementById('refreshPreview');

            // レンジスライダー
            this.elements.ranges = {
                autoPlayInterval: document.getElementById('autoPlayIntervalRange'),
                transitionDuration: document.getElementById('transitionDurationRange')
            };
        },

        setupEvents: function() {
            var self = this;

            // フォーム変更時のプレビュー更新
            if (this.elements.form) {
                var inputs = this.elements.form.querySelectorAll('input, select, textarea');
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('change', function() {
                        self.schedulePreviewUpdate();
                    });
                }
            }

            // レンジスライダー
            if (this.elements.ranges.autoPlayInterval) {
                this.elements.ranges.autoPlayInterval.addEventListener('input', function() {
                    self.updateAutoPlayIntervalDisplay(this.value);
                    self.updateFormField('auto_play_interval', this.value * 1000);
                    self.schedulePreviewUpdate();
                });
            }

            if (this.elements.ranges.transitionDuration) {
                this.elements.ranges.transitionDuration.addEventListener('input', function() {
                    self.updateTransitionDurationDisplay(this.value);
                    self.updateFormField('transition_duration', this.value);
                    self.schedulePreviewUpdate();
                });
            }

            // リセットボタン
            if (this.elements.resetBtn) {
                this.elements.resetBtn.addEventListener('click', function() {
                    self.showResetModal();
                });
            }

            // 検証ボタン
            if (this.elements.validateBtn) {
                this.elements.validateBtn.addEventListener('click', function() {
                    self.validateConfig();
                });
            }

            // プレビュー更新ボタン
            if (this.elements.refreshPreviewBtn) {
                this.elements.refreshPreviewBtn.addEventListener('click', function() {
                    self.updatePreview();
                });
            }

            // リセット確認モーダル
            var confirmResetBtn = document.getElementById('confirmReset');
            if (confirmResetBtn) {
                confirmResetBtn.addEventListener('click', function() {
                    self.resetConfig();
                });
            }

            // 自動再生チェックボックス
            var autoPlayCheckbox = this.elements.form.querySelector('input[name*="auto_play"]');
            if (autoPlayCheckbox) {
                autoPlayCheckbox.addEventListener('change', function() {
                    self.toggleAutoPlayFields(this.checked);
                });
                // 初期状態を設定
                this.toggleAutoPlayFields(autoPlayCheckbox.checked);
            }
        },

        updateAutoPlayIntervalDisplay: function(seconds) {
            var display = document.getElementById('autoPlayIntervalDisplay');
            if (display) {
                display.textContent = seconds + '秒';
            }
        },

        updateTransitionDurationDisplay: function(milliseconds) {
            var display = document.getElementById('transitionDurationDisplay');
            if (display) {
                display.textContent = milliseconds + 'ms';
            }
        },

        updateFormField: function(fieldName, value) {
            var field = this.elements.form.querySelector('[name*="' + fieldName + '"]');
            if (field) {
                field.value = value;
            }
        },

        toggleAutoPlayFields: function(enabled) {
            var intervalField = this.elements.form.querySelector('input[name*="auto_play_interval"]');
            var intervalRange = this.elements.ranges.autoPlayInterval;
            
            if (intervalField) {
                intervalField.disabled = !enabled;
                if (!enabled) {
                    intervalField.style.opacity = '0.5';
                } else {
                    intervalField.style.opacity = '';
                }
            }
            
            if (intervalRange) {
                intervalRange.disabled = !enabled;
                if (!enabled) {
                    intervalRange.style.opacity = '0.5';
                } else {
                    intervalRange.style.opacity = '';
                }
            }
        },

        schedulePreviewUpdate: function() {
            var self = this;
            
            // 既存のタイマーをクリア
            if (this.previewTimer) {
                clearTimeout(this.previewTimer);
            }
            
            // 500ms後にプレビュー更新
            this.previewTimer = setTimeout(function() {
                self.updatePreview();
            }, 500);
        },

        updatePreview: function() {
            if (!this.elements.previewContainer) return;

            var self = this;
            var formData = this.getFormData();

            // ローディング表示
            this.elements.previewContainer.innerHTML = 
                '<div class="text-center py-5">' +
                    '<i class="fa fa-spinner fa-spin fa-2x text-muted"></i>' +
                    '<p class="text-muted mt-2">プレビューを更新中...</p>' +
                '</div>';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.config.urls.preview, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                self.renderPreview(response.config);
                            } else {
                                self.showPreviewError(response.errors || ['プレビューの生成に失敗しました']);
                            }
                        } catch (e) {
                            self.showPreviewError(['プレビューデータの解析に失敗しました']);
                        }
                    } else {
                        self.showPreviewError(['プレビューの取得に失敗しました']);
                    }
                }
            };

            xhr.send(this.encodeFormData(formData));
        },

        renderPreview: function(config) {
            var previewHtml = this.generatePreviewHtml(config);
            this.elements.previewContainer.innerHTML = previewHtml;
            
            // プレビュー用JavaScriptを実行
            this.initializePreviewCarousel(config);
        },

        generatePreviewHtml: function(config) {
            var html = 
                '<div class="carousel-preview-demo" data-config=\'' + JSON.stringify(config) + '\'>' +
                    '<div class="carousel-container">' +
                        '<div class="carousel-wrapper">' +
                            '<div class="carousel-track" id="previewCarouselTrack">';

            // サンプル画像でスライドを生成
            var sampleImages = [
                { title: 'サンプル画像 1', color: '#007bff' },
                { title: 'サンプル画像 2', color: '#28a745' },
                { title: 'サンプル画像 3', color: '#dc3545' },
                { title: 'サンプル画像 4', color: '#ffc107' },
                { title: 'サンプル画像 5', color: '#17a2b8' }
            ];

            var displayCount = Math.min(config.displayCount, sampleImages.length);
            
            for (var i = 0; i < displayCount; i++) {
                var sample = sampleImages[i];
                html += 
                    '<div class="carousel-slide" data-slide="' + i + '">' +
                        '<div class="carousel-slide-inner">' +
                            '<div class="carousel-image-wrapper">' +
                                '<div class="sample-image" style="background:' + sample.color + ';width:100%;height:200px;display:flex;align-items:center;justify-content:center;color:white;font-size:1.2rem;">' +
                                    sample.title +
                                '</div>' +
                                '<div class="carousel-overlay">' +
                                    '<div class="carousel-content">' +
                                        '<h3 class="carousel-title">プレビュータイトル ' + (i + 1) + '</h3>' +
                                        '<p class="carousel-description">設定プレビュー用のサンプルコンテンツです。</p>' +
                                        '<div class="carousel-action">' +
                                            '<a href="#" class="carousel-btn btn-primary">サンプルボタン</a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
            }

            html += '</div>';

            // ナビゲーションボタン
            if (config.showNavigation && displayCount > 1) {
                html += 
                    '<button type="button" class="carousel-nav carousel-nav-prev" id="previewPrev">' +
                        '<i class="fa fa-chevron-left"></i>' +
                    '</button>' +
                    '<button type="button" class="carousel-nav carousel-nav-next" id="previewNext">' +
                        '<i class="fa fa-chevron-right"></i>' +
                    '</button>';
            }

            html += '</div>';

            // インジケーター
            if (config.showIndicators && displayCount > 1) {
                html += '<div class="carousel-indicators" id="previewIndicators">';
                for (var j = 0; j < displayCount; j++) {
                    html += 
                        '<button type="button" class="carousel-indicator' + (j === 0 ? ' active' : '') + '" data-slide="' + j + '">' +
                        '</button>';
                }
                html += '</div>';
            }

            // 設定情報表示
            html += 
                '<div class="preview-info mt-3">' +
                    '<div class="row small text-muted">' +
                        '<div class="col-md-6">' +
                            '<strong>表示設定:</strong><br>' +
                            '表示枚数: ' + config.displayCount + '枚<br>' +
                            '自動再生: ' + (config.autoPlay ? 'ON (' + (config.autoPlayInterval / 1000) + '秒間隔)' : 'OFF') + '<br>' +
                            'トランジション: ' + config.transitionEffect + ' (' + config.transitionDuration + 'ms)' +
                        '</div>' +
                        '<div class="col-md-6">' +
                            '<strong>UI設定:</strong><br>' +
                            'ナビゲーション: ' + (config.showNavigation ? 'ON' : 'OFF') + '<br>' +
                            'インジケーター: ' + (config.showIndicators ? 'ON' : 'OFF') + '<br>' +
                            'タッチスワイプ: ' + (config.enableTouchSwipe ? 'ON' : 'OFF') +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';

            return html;
        },

        initializePreviewCarousel: function(config) {
            // 簡易カルーセル機能（プレビュー用）
            var container = this.elements.previewContainer.querySelector('.carousel-preview-demo');
            if (!container) return;

            var track = container.querySelector('#previewCarouselTrack');
            var slides = container.querySelectorAll('.carousel-slide');
            var prevBtn = container.querySelector('#previewPrev');
            var nextBtn = container.querySelector('#previewNext');
            var indicators = container.querySelectorAll('.carousel-indicator');

            var currentSlide = 0;
            var totalSlides = slides.length;
            var autoPlayTimer = null;

            function updateSlide() {
                if (track) {
                    var translateX = -currentSlide * 100;
                    track.style.transform = 'translateX(' + translateX + '%)';
                    track.style.transition = 'transform ' + config.transitionDuration + 'ms ease';
                }

                // インジケーター更新
                for (var i = 0; i < indicators.length; i++) {
                    indicators[i].classList.remove('active');
                }
                if (indicators[currentSlide]) {
                    indicators[currentSlide].classList.add('active');
                }
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlide();
            }

            function prevSlide() {
                currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
                updateSlide();
            }

            function goToSlide(index) {
                currentSlide = index;
                updateSlide();
            }

            // イベント設定
            if (prevBtn) {
                prevBtn.addEventListener('click', prevSlide);
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', nextSlide);
            }

            for (var i = 0; i < indicators.length; i++) {
                (function(index) {
                    indicators[index].addEventListener('click', function() {
                        goToSlide(index);
                    });
                })(i);
            }

            // 自動再生
            if (config.autoPlay && totalSlides > 1) {
                autoPlayTimer = setInterval(nextSlide, config.autoPlayInterval);
                
                // ホバー時に停止
                container.addEventListener('mouseenter', function() {
                    if (autoPlayTimer) {
                        clearInterval(autoPlayTimer);
                    }
                });

                container.addEventListener('mouseleave', function() {
                    autoPlayTimer = setInterval(nextSlide, config.autoPlayInterval);
                });
            }

            // 初期化
            updateSlide();
        },

        showPreviewError: function(errors) {
            var errorHtml = 
                '<div class="text-center py-5">' +
                    '<i class="fa fa-exclamation-triangle fa-2x text-warning mb-3"></i>' +
                    '<p class="text-muted">プレビューの生成に失敗しました</p>';

            if (errors && errors.length > 0) {
                errorHtml += '<ul class="text-left list-unstyled small text-danger">';
                for (var i = 0; i < errors.length; i++) {
                    errorHtml += '<li>• ' + errors[i] + '</li>';
                }
                errorHtml += '</ul>';
            }

            errorHtml += '</div>';
            this.elements.previewContainer.innerHTML = errorHtml;
        },

        validateConfig: function() {
            var self = this;
            var formData = this.getFormData();

            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.config.urls.validate, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                self.showAlert('success', response.message || '設定は有効です');
                            } else {
                                var errorMessage = '設定に問題があります:\n' + (response.errors || []).join('\n');
                                self.showAlert('error', errorMessage);
                            }
                        } catch (e) {
                            self.showAlert('error', '検証中にエラーが発生しました');
                        }
                    }
                }
            };

            xhr.send(this.encodeFormData(formData));
        },

        showResetModal: function() {
            var modal = document.getElementById('resetModal');
            if (modal && typeof $ !== 'undefined') {
                $('#resetModal').modal('show');
            }
        },

        resetConfig: function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.config.urls.reset, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    // モーダルを閉じる
                    if (typeof $ !== 'undefined') {
                        $('#resetModal').modal('hide');
                    }

                    if (xhr.status === 302 || xhr.status === 200) {
                        window.location.reload();
                    }
                }
            };

            xhr.send('_token=' + encodeURIComponent(this.config.csrfToken));
        },

        getFormData: function() {
            var formData = {};
            if (!this.elements.form) return formData;

            var elements = this.elements.form.elements;
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                if (element.name && element.value !== '') {
                    if (element.type === 'checkbox') {
                        formData[element.name] = element.checked;
                    } else if (element.type === 'radio') {
                        if (element.checked) {
                            formData[element.name] = element.value;
                        }
                    } else {
                        formData[element.name] = element.value;
                    }
                }
            }

            return formData;
        },

        encodeFormData: function(data) {
            var encoded = [];
            for (var key in data) {
                encoded.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
            }
            encoded.push('_token=' + encodeURIComponent(this.config.csrfToken));
            return encoded.join('&');
        },

        initializePreview: function() {
            // 初期プレビュー表示
            setTimeout(function() {
                CarouselAdminConfig.updatePreview();
            }, 500);
        },

        showAlert: function(type, message) {
            var className = 'alert-' + (type === 'error' ? 'danger' : type);
            var alertDiv = document.createElement('div');
            alertDiv.className = 'alert ' + className + ' alert-dismissible fade show position-fixed';
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = 
                '<button type="button" class="close" onclick="this.parentNode.remove()">' +
                    '<span>&times;</span>' +
                '</button>' +
                '<i class="fa fa-' + this.getAlertIcon(type) + '"></i> ' +
                message.replace(/\n/g, '<br>');

            document.body.appendChild(alertDiv);

            // 5秒後に自動削除
            setTimeout(function() {
                if (alertDiv.parentNode) {
                    alertDiv.parentNode.removeChild(alertDiv);
                }
            }, 5000);
        },

        getAlertIcon: function(type) {
            var icons = {
                'success': 'check-circle',
                'error': 'exclamation-circle',
                'warning': 'exclamation-triangle',
                'info': 'info-circle'
            };
            return icons[type] || 'info-circle';
        },

        getCsrfToken: function() {
            var tokenElement = document.getElementById('csrf_token');
            return tokenElement ? tokenElement.value : '';
        }
    };

    // DOM読み込み完了時に初期化
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            CarouselAdminConfig.init();
        });
    } else {
        CarouselAdminConfig.init();
    }

    // グローバルに公開
    window.CarouselAdminConfig = CarouselAdminConfig;

})();