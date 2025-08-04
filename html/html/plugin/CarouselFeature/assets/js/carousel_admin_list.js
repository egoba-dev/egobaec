/*!
 * CarouselFeature - 管理画面一覧用JavaScript
 * クラシックJavaScript (ES5準拠)
 */

(function() {
    'use strict';

    var CarouselAdminList = {
        config: {
            csrfToken: '',
            urls: {
                sort: '/admin/carousel_feature/sort',
                bulkStatus: '/admin/carousel_feature/bulk-status',
                bulkDelete: '/admin/carousel_feature/bulk-delete',
                duplicate: '/admin/carousel_feature/{id}/duplicate',
                delete: '/admin/carousel_feature/{id}/delete',
                export: '/admin/carousel_feature/export'
            }
        },

        elements: {
            table: null,
            checkAll: null,
            checkboxes: null,
            sortableBody: null,
            bulkActions: {},
            deleteModal: null,
            exportBtn: null
        },

        selectedIds: [],
        sortableInstance: null,

        init: function() {
            this.config.csrfToken = this.getCsrfToken();
            this.setupElements();
            this.setupEvents();
            this.initializeSortable();
        },

        setupElements: function() {
            this.elements.table = document.getElementById('carouselTable');
            this.elements.checkAll = document.getElementById('checkAll');
            this.elements.checkboxes = document.querySelectorAll('.carousel-check');
            this.elements.sortableBody = document.getElementById('sortableCarousels');
            this.elements.deleteModal = document.getElementById('deleteModal');
            this.elements.exportBtn = document.getElementById('exportCsv');

            // 一括操作ボタン
            this.elements.bulkActions = {
                publish: document.getElementById('bulkPublish'),
                draft: document.getElementById('bulkDraft'),
                inactive: document.getElementById('bulkInactive'),
                delete: document.getElementById('bulkDelete')
            };
        },

        setupEvents: function() {
            var self = this;

            // 全選択チェックボックス
            if (this.elements.checkAll) {
                this.elements.checkAll.addEventListener('change', function() {
                    self.toggleAllCheckboxes(this.checked);
                });
            }

            // 個別チェックボックス
            for (var i = 0; i < this.elements.checkboxes.length; i++) {
                this.elements.checkboxes[i].addEventListener('change', function() {
                    self.updateSelectedIds();
                    self.updateBulkActionState();
                });
            }

            // 一括操作ボタン
            if (this.elements.bulkActions.publish) {
                this.elements.bulkActions.publish.addEventListener('click', function(e) {
                    e.preventDefault();
                    self.bulkUpdateStatus('published');
                });
            }

            if (this.elements.bulkActions.draft) {
                this.elements.bulkActions.draft.addEventListener('click', function(e) {
                    e.preventDefault();
                    self.bulkUpdateStatus('draft');
                });
            }

            if (this.elements.bulkActions.inactive) {
                this.elements.bulkActions.inactive.addEventListener('click', function(e) {
                    e.preventDefault();
                    self.bulkUpdateStatus('inactive');
                });
            }

            if (this.elements.bulkActions.delete) {
                this.elements.bulkActions.delete.addEventListener('click', function(e) {
                    e.preventDefault();
                    self.bulkDelete();
                });
            }

            // 削除ボタン
            var deleteButtons = document.querySelectorAll('.delete-btn');
            for (var j = 0; j < deleteButtons.length; j++) {
                deleteButtons[j].addEventListener('click', function() {
                    self.showDeleteModal(
                        this.getAttribute('data-id'),
                        this.getAttribute('data-title')
                    );
                });
            }

            // 複製ボタン
            var duplicateButtons = document.querySelectorAll('.duplicate-btn');
            for (var k = 0; k < duplicateButtons.length; k++) {
                duplicateButtons[k].addEventListener('click', function() {
                    self.duplicateCarousel(this.getAttribute('data-id'));
                });
            }

            // 削除確認モーダル
            var confirmDeleteBtn = document.getElementById('confirmDelete');
            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', function() {
                    self.confirmDelete();
                });
            }

            // CSVエクスポート
            if (this.elements.exportBtn) {
                this.elements.exportBtn.addEventListener('click', function() {
                    self.exportCsv();
                });
            }
        },

        initializeSortable: function() {
            if (!this.elements.sortableBody) return;

            var self = this;
            
            // 簡易ソート機能（ドラッグ&ドロップ）
            this.setupDragAndDrop();
        },

        setupDragAndDrop: function() {
            var self = this;
            var draggedElement = null;
            var rows = this.elements.sortableBody.querySelectorAll('tr');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var sortHandle = row.querySelector('.sort-handle');
                
                if (sortHandle) {
                    row.draggable = true;

                    row.addEventListener('dragstart', function(e) {
                        draggedElement = this;
                        this.style.opacity = '0.5';
                        e.dataTransfer.effectAllowed = 'move';
                        e.dataTransfer.setData('text/html', this.innerHTML);
                    });

                    row.addEventListener('dragend', function(e) {
                        this.style.opacity = '';
                        draggedElement = null;
                    });

                    row.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        e.dataTransfer.dropEffect = 'move';
                        return false;
                    });

                    row.addEventListener('dragenter', function(e) {
                        this.classList.add('sortable-ghost');
                    });

                    row.addEventListener('dragleave', function(e) {
                        this.classList.remove('sortable-ghost');
                    });

                    row.addEventListener('drop', function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        
                        this.classList.remove('sortable-ghost');
                        
                        if (draggedElement !== this) {
                            var parent = this.parentNode;
                            var nextSibling = this.nextSibling;
                            
                            if (nextSibling) {
                                parent.insertBefore(draggedElement, nextSibling);
                            } else {
                                parent.appendChild(draggedElement);
                            }
                            
                            self.updateSortOrder();
                        }
                        return false;
                    });
                }
            }
        },

        updateSortOrder: function() {
            var rows = this.elements.sortableBody.querySelectorAll('tr');
            var sortData = [];

            for (var i = 0; i < rows.length; i++) {
                var id = rows[i].getAttribute('data-id');
                if (id) {
                    sortData.push({
                        id: parseInt(id),
                        sort_no: i + 1
                    });
                }
            }

            this.sendSortUpdate(sortData);
        },

        sendSortUpdate: function(sortData) {
            var self = this;
            var xhr = new XMLHttpRequest();

            xhr.open('POST', this.config.urls.sort, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                self.showAlert('success', 'ソート順を更新しました');
                                self.updateSortNumbers();
                            } else {
                                self.showAlert('error', response.message || 'ソート順の更新に失敗しました');
                            }
                        } catch (e) {
                            self.showAlert('error', 'ソート順の更新中にエラーが発生しました');
                        }
                    } else {
                        self.showAlert('error', 'ソート順の更新に失敗しました');
                    }
                }
            };

            var formData = 'sort_data=' + encodeURIComponent(JSON.stringify(sortData)) +
                          '&_token=' + encodeURIComponent(this.config.csrfToken);
            xhr.send(formData);
        },

        updateSortNumbers: function() {
            var rows = this.elements.sortableBody.querySelectorAll('tr');
            for (var i = 0; i < rows.length; i++) {
                var sortDisplay = rows[i].querySelector('.sort-handle');
                if (sortDisplay) {
                    var textNode = sortDisplay.childNodes[sortDisplay.childNodes.length - 1];
                    if (textNode && textNode.nodeType === Node.TEXT_NODE) {
                        textNode.textContent = ' ' + (i + 1);
                    }
                }
            }
        },

        toggleAllCheckboxes: function(checked) {
            for (var i = 0; i < this.elements.checkboxes.length; i++) {
                this.elements.checkboxes[i].checked = checked;
            }
            this.updateSelectedIds();
            this.updateBulkActionState();
        },

        updateSelectedIds: function() {
            this.selectedIds = [];
            for (var i = 0; i < this.elements.checkboxes.length; i++) {
                if (this.elements.checkboxes[i].checked) {
                    this.selectedIds.push(parseInt(this.elements.checkboxes[i].value));
                }
            }

            // 全選択チェックボックスの状態更新
            if (this.elements.checkAll) {
                if (this.selectedIds.length === 0) {
                    this.elements.checkAll.indeterminate = false;
                    this.elements.checkAll.checked = false;
                } else if (this.selectedIds.length === this.elements.checkboxes.length) {
                    this.elements.checkAll.indeterminate = false;
                    this.elements.checkAll.checked = true;
                } else {
                    this.elements.checkAll.indeterminate = true;
                }
            }
        },

        updateBulkActionState: function() {
            var hasSelection = this.selectedIds.length > 0;
            
            for (var key in this.elements.bulkActions) {
                if (this.elements.bulkActions[key]) {
                    if (hasSelection) {
                        this.elements.bulkActions[key].style.opacity = '1';
                        this.elements.bulkActions[key].style.pointerEvents = 'auto';
                    } else {
                        this.elements.bulkActions[key].style.opacity = '0.5';
                        this.elements.bulkActions[key].style.pointerEvents = 'none';
                    }
                }
            }
        },

        bulkUpdateStatus: function(status) {
            if (this.selectedIds.length === 0) {
                this.showAlert('warning', '記事を選択してください');
                return;
            }

            var statusText = {
                'published': '公開',
                'draft': '下書き',
                'inactive': '非公開'
            };

            if (!confirm(this.selectedIds.length + '件の記事を' + statusText[status] + 'に変更しますか？')) {
                return;
            }

            var self = this;
            var xhr = new XMLHttpRequest();

            xhr.open('POST', this.config.urls.bulkStatus, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                self.showAlert('success', response.message);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                self.showAlert('error', response.message);
                            }
                        } catch (e) {
                            self.showAlert('error', 'ステータス更新中にエラーが発生しました');
                        }
                    }
                }
            };

            var formData = 'ids=' + encodeURIComponent(JSON.stringify(this.selectedIds)) +
                          '&status=' + encodeURIComponent(status) +
                          '&_token=' + encodeURIComponent(this.config.csrfToken);
            xhr.send(formData);
        },

        bulkDelete: function() {
            if (this.selectedIds.length === 0) {
                this.showAlert('warning', '記事を選択してください');
                return;
            }

            if (!confirm(this.selectedIds.length + '件の記事を削除しますか？\n※この操作は取り消せません。')) {
                return;
            }

            var self = this;
            var xhr = new XMLHttpRequest();

            xhr.open('POST', this.config.urls.bulkDelete, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                self.showAlert('success', response.message);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                self.showAlert('error', response.message);
                            }
                        } catch (e) {
                            self.showAlert('error', '削除中にエラーが発生しました');
                        }
                    }
                }
            };

            var formData = 'ids=' + encodeURIComponent(JSON.stringify(this.selectedIds)) +
                          '&_token=' + encodeURIComponent(this.config.csrfToken);
            xhr.send(formData);
        },

        showDeleteModal: function(id, title) {
            this.currentDeleteId = id;
            
            var titleElement = document.getElementById('deleteTargetTitle');
            if (titleElement) {
                titleElement.textContent = title;
            }

            // Bootstrap モーダル表示
            if (typeof $ !== 'undefined' && this.elements.deleteModal) {
                $('#deleteModal').modal('show');
            }
        },

        confirmDelete: function() {
            if (!this.currentDeleteId) return;

            var self = this;
            var xhr = new XMLHttpRequest();
            var url = this.config.urls.delete.replace('{id}', this.currentDeleteId);

            xhr.open('DELETE', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    // モーダルを閉じる
                    if (typeof $ !== 'undefined') {
                        $('#deleteModal').modal('hide');
                    }

                    if (xhr.status === 302 || xhr.status === 200) {
                        self.showAlert('success', '記事を削除しました');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        self.showAlert('error', '記事の削除に失敗しました');
                    }
                }
            };

            xhr.send('_token=' + encodeURIComponent(this.config.csrfToken));
        },

        duplicateCarousel: function(id) {
            if (!confirm('この記事を複製しますか？')) return;

            var self = this;
            var xhr = new XMLHttpRequest();
            var url = this.config.urls.duplicate.replace('{id}', id);

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 302 || xhr.status === 200) {
                        self.showAlert('success', '記事を複製しました');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        self.showAlert('error', '記事の複製に失敗しました');
                    }
                }
            };

            xhr.send('_token=' + encodeURIComponent(this.config.csrfToken));
        },

        exportCsv: function() {
            // 現在の検索条件を取得
            var searchForm = document.querySelector('form');
            var searchParams = {};

            if (searchForm) {
                var formData = new FormData(searchForm);
                for (var pair of formData.entries()) {
                    if (pair[1]) {
                        searchParams[pair[0]] = pair[1];
                    }
                }
            }

            // CSVエクスポート実行
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = this.config.urls.export;

            // CSRFトークン
            var tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = this.config.csrfToken;
            form.appendChild(tokenInput);

            // 検索パラメータ
            var paramsInput = document.createElement('input');
            paramsInput.type = 'hidden';
            paramsInput.name = 'search_params';
            paramsInput.value = JSON.stringify(searchParams);
            form.appendChild(paramsInput);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);

            this.showAlert('info', 'CSVエクスポートを開始しました');
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
                message;

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
            CarouselAdminList.init();
        });
    } else {
        CarouselAdminList.init();
    }

    // グローバルに公開
    window.CarouselAdminList = CarouselAdminList;

})();