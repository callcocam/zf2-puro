class Uploads extends SIGAMessages {

    constructor() {
        super();
        this.formUpload = $(".uploadFiles");
        this.alert = '.container .alert';
        this.filesList = $('#files');
    }

    initFileUpload(_Upload, _this) {

        if (_this.size() === 0) {
            return;
        }

        _this.submit(function (e) {
            e.preventDefault();
            $(_Upload.alert).remove();
            _Upload.uploadFiles(_Upload, $(this));

        });
    }

    uploadFiles(_Upload, _this) {

        var action = _this.attr('action');
        var method = _this.attr('method');
        $.ajax({
            url: action,
            type: method,
            data: new FormData(_this[0]),
            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {
                // This will make the ajax request to use a custom XHR object which will handle the progress
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    var progressBar = _Upload.initProgressBar(_Upload, _this);
                    // Add progress event handler
                    myXhr.upload.addEventListener('progress', function (e) {
                        _Upload.handleUploadProgress(e, progressBar);
                    }, false);
                    myXhr.upload.addEventListener('load', function () {
                        // Firefox does not trigger the 'progress' event when upload is 100%.
                        // This forces progress to end when upload is successful
                        progressBar.find('.progress-bar').css({ width: '100%' });
                    }, false);
                }
                return myXhr;
            }
        }).done(function (resp) {
            if (resp.code === 'success') {
                _Upload.rercaregaFilesList(_Upload);
                _this.after(
                    '<div class="alert trigger trigger_success" style="margin-top: 20px">' +
                    '<div>' + resp.msg + '</div>' +
                    '</div>'
                )
            } else {
                _this.after(
                    '<div class="alert trigger trigger_error" style="margin-top: 20px">' +
                    '<div>' + resp.msg + '</div>' +
                    '</div>'
                )
            }

        });
    }


    handleUploadProgress(e, progressBar) {
        if (!e.lengthComputable) {
            return;
        }
        var percent = e.total > 0 ? e.loaded * 100 / e.total : 100;
        progressBar.find('.progress-bar').css({ width: percent + '%' });
        progressBar.find('.progress-bar').text(parseInt(percent) + '%');
    }


    initProgressBar(_Upload, _this) {
        var _fieldset = _this.closest('fieldset'),
            progressBar =
                '<div class="progress">' +
                '<div class="progress-bar progress-bar-striped active" role="progressbar">0%</div>' +
                '</div>';
        _fieldset.find('.progress').remove();
        _fieldset.append(progressBar);

        return _fieldset.find('.progress');
    }
    rercaregaFilesList(_Upload) {
        var url = _Upload.filesList.data('contentUrl');
        _Upload.filesList.load(url);
    }

    removeFile(_this,_UpExcluir) {
        
        if (_this.hasClass('btn-blue')) {
            _this.removeClass('btn-blue');
            _this.addClass('btn-red');
            _this.children('.hidden-xs').text('CONFIMAR');
            setTimeout(function () {
                _this.addClass('btn-blue');
                _this.removeClass('btn-red');
                _this.children('.hidden-xs').text('EXCLUIR');
            }, 10000);
        } else {
            _UpExcluir.ajaxFunction(_this.attr('href'), 'get', 'json', '', _UpExcluir);
            setTimeout(function () {
                if (_UpExcluir.resultAction) {
                    _this.parent().parent('tr').remove();
                }
            }, 1000);

        }
    }
}

$(function () {
    _Up = new Uploads();
    _Up.initFileUpload(_Up, $(".uploadFile"));
    //  _Up.initFileUpload(_Up,$(".uploadFile"));
    $('.remove-file').click(function(e){
        _UpExcluir=new App();
        e.preventDefault();
        _Up.removeFile($(this),_UpExcluir);
    })
})