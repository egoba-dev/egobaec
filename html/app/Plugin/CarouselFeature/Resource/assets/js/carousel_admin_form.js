/**
 * CarouselFeature - 管理画面フォーム用JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('CarouselFeature admin form loaded');
    
    // リンクタイプ選択の制御
    initLinkTypeControl();
    
    // 画像アップロード機能
    initImageUpload();
    
    // フォーム送信時の処理
    initFormSubmission();
});

/**
 * リンクタイプ選択の制御
 */
function initLinkTypeControl() {
    const linkTypeSelect = document.querySelector('select[name="carousel_config[link_type]"], select[name*="link_type"]');
    if (!linkTypeSelect) return;
    
    const linkFields = document.querySelectorAll('.link-field');
    const linkTextField = document.querySelector('.link-text-field');
    
    function updateLinkFields() {
        const selectedType = linkTypeSelect.value;
        
        // 全てのフィールドを非表示
        linkFields.forEach(field => {
            field.style.display = 'none';
        });
        
        // 選択されたタイプに応じてフィールドを表示
        switch(selectedType) {
            case 'product':
                const productField = document.querySelector('.link-field[data-type="product"]');
                if (productField) productField.style.display = 'block';
                if (linkTextField) linkTextField.style.display = 'block';
                break;
                
            case 'external':
            case 'internal':
                const urlField = document.querySelector('.link-field[data-type="url"]');
                if (urlField) urlField.style.display = 'block';
                if (linkTextField) linkTextField.style.display = 'block';
                break;
                
            case 'none':
            default:
                // リンクなしの場合は何も表示しない
                break;
        }
    }
    
    // 初期表示
    updateLinkFields();
    
    // 変更時の処理
    linkTypeSelect.addEventListener('change', updateLinkFields);
}

/**
 * 画像アップロード機能
 */
function initImageUpload() {
    const uploadDropzone = document.getElementById('uploadDropzone');
    const fileInput = document.querySelector('input[type="file"][accept*="image"]');
    const imagePreview = document.getElementById('imagePreview');
    
    if (!uploadDropzone || !fileInput) return;
    
    // クリックでファイル選択
    uploadDropzone.addEventListener('click', function() {
        fileInput.click();
    });
    
    // ドラッグ&ドロップ
    uploadDropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadDropzone.classList.add('dragover');
    });
    
    uploadDropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadDropzone.classList.remove('dragover');
    });
    
    uploadDropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadDropzone.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFileSelection(files);
        }
    });
    
    // ファイル選択時
    fileInput.addEventListener('change', function() {
        handleFileSelection(this.files);
    });
    
    function handleFileSelection(files) {
        if (!imagePreview) return;
        
        // プレビューをクリア
        imagePreview.innerHTML = '';
        
        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                createImagePreview(file);
            }
        });
    }
    
    function createImagePreview(file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const previewItem = document.createElement('div');
            previewItem.className = 'image-preview-item';
            
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="プレビュー">
                <div class="image-preview-overlay">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removePreview(this)">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <div class="preview-info">
                    <small>${file.name}</small><br>
                    <small>${(file.size / 1024 / 1024).toFixed(2)} MB</small>
                </div>
            `;
            
            imagePreview.appendChild(previewItem);
        };
        
        reader.readAsDataURL(file);
    }
}

/**
 * プレビューアイテムを削除
 */
function removePreview(button) {
    const previewItem = button.closest('.image-preview-item');
    if (previewItem) {
        previewItem.remove();
    }
}

/**
 * フォーム送信時の処理
 */
function initFormSubmission() {
    const form = document.getElementById('carouselForm');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        const submitButton = e.submitter;
        
        if (submitButton) {
            const mode = submitButton.getAttribute('name') === 'mode' ? submitButton.value : 'save';
            
            // ステータスを送信モードに応じて設定
            const statusSelect = form.querySelector('select[name*="status"]');
            if (statusSelect && mode === 'publish') {
                statusSelect.value = 'published';
            } else if (statusSelect && mode === 'draft') {
                statusSelect.value = 'draft';
            }
        }
        
        // バリデーション
        const title = form.querySelector('input[name*="title"]');
        if (title && !title.value.trim()) {
            alert('タイトルを入力してください。');
            e.preventDefault();
            title.focus();
            return false;
        }
        
        // 送信中は重複送信を防ぐ
        const submitButtons = form.querySelectorAll('button[type="submit"]');
        submitButtons.forEach(btn => {
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> 処理中...';
        });
        
        return true;
    });
}

/**
 * プレビュー表示
 */
function showPreview() {
    const modal = document.getElementById('previewModal');
    const content = document.getElementById('previewContent');
    
    if (!modal || !content) return;
    
    // フォームデータを取得してプレビューを生成
    const form = document.getElementById('carouselForm');
    const formData = new FormData(form);
    
    content.innerHTML = `
        <div class="text-center">
            <i class="fa fa-spinner fa-spin fa-2x"></i>
            <p>プレビューを生成中...</p>
        </div>
    `;
    
    // モーダルを表示（Bootstrap 4の場合）
    if (typeof $ !== 'undefined' && $.fn.modal) {
        $(modal).modal('show');
    } else {
        modal.style.display = 'block';
        modal.classList.add('show');
    }
    
    // 実際のプレビュー生成（簡易版）
    setTimeout(() => {
        const title = formData.get('carousel_config[title]') || 'タイトル未設定';
        const content_text = formData.get('carousel_config[content]') || '';
        
        content.innerHTML = `
            <div class="carousel-preview">
                <h3>${title}</h3>
                ${content_text ? `<p>${content_text}</p>` : ''}
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i>
                    実際の表示は、画像や設定により異なります。
                </div>
            </div>
        `;
    }, 1000);
}

// プレビューボタンのイベントリスナー
document.addEventListener('DOMContentLoaded', function() {
    const previewBtn = document.getElementById('previewBtn');
    if (previewBtn) {
        previewBtn.addEventListener('click', showPreview);
    }
});

// グローバル関数として公開
window.CarouselFeatureAdmin = {
    showPreview: showPreview,
    removePreview: removePreview
};