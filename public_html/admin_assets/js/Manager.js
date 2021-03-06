class Manager extends SIGAMessages {
    constructor() {
        super();
        this.formManger = $(".Manager");
        this.save = $("#save");
        this.save_copy = $("#save_copy");
        this.id = $("#id");
        this.codigo = $("#codigo");

        this.seletorAttach = $('#attachment');
        this.seletorSqlAttach = $("#attachmentSql");
        this.preview = '.preview_IMG';
        this.fileText = '.file-text';
        this.wd = "300";
        this.hg = "251";

        this.ManagerFormOption = {
            beforeSubmit: null, // pre-submit callback 
            success: null, // post-submit callback 
            type: 'post', // 'get' or 'post', override for form's 'method' attribute 
            dataType: 'json' // 'xml', 'script', or 'json' (expected server response type) 
        };

    }

    showRequest(formData, jqForm, options) {
        $(_Manager.carregando).fadeIn('fast');
        $(_Manager.target).empty().removeClass(_this.classeResult);
        return true;
    }; // post-submit callback 

    showResponse(responseText, statusText, xhr, $form) {
        $(_Manager.carregando).hide('fast');
        _Manager.messageSiga(responseText.msg, responseText.class);
        _Manager.result = responseText.result;
         // console.log(_Manager.result);
         // console.log(responseText.id);
         // console.log(responseText.codigo);

        if (responseText.id && _Manager.result) {
            _Manager.save_copy.removeAttr('disabled');
            _Manager.id.val(responseText.id);
            _Manager.codigo.val(responseText.codigo);
        }
        if (responseText.codigo && _Manager.result) {
            _Manager.codigo.val(responseText.codigo);
        }

        if ($(responseText.action).length) {
            if (responseText.result) {
                $(responseText.action).change();
            }
        }
    }



    selectImg(event, _ManagerImg) {
        $(_ManagerImg.preview).attr({
            src: URL.createObjectURL(event.target.files[0]),
            width: _ManagerImg.wd,
            height: _ManagerImg.hg
        });
        $(_ManagerImg.fileText).text(event.target.value.split('\\').pop());

    }

    selectImgPreview(_ManagerImg) {
         var input = _ManagerImg.seletorAttach;
        formdata = false;
        if (window.FormData) {
           var formdata = new FormData();
        }
        input.bind('change', function () {
            //this.files = null;
            formdata.append('attachment', this.files[0]);
            $.ajax({
                url: '/admin/admin/upload',
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: formdata,
                beforeSend:function()
                {
                    $(_ManagerImg.carregando).hide('fast');
                },
                success: function (data) {
                    
                    _ManagerImg.messageSiga(data.msg, data.class);
                    if(data.result){
                        $("#image-preview").attr('src',data.temp);
                        $("#images").val(data.realfolder);
                    }
                    
                }
            });
        });
    }
    selectSql(_ManagerSql) {
        var input = _ManagerSql.seletorSqlAttach;
        formdata = false;
        if (window.FormData) {
           var formdata = new FormData();
        }
        input.bind('change', function () {
            //this.files = null;
            formdata.append('attachment', this.files[0]);
            $.ajax({
                url: '/admin/admin/upload',
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: formdata,
                success: function (data) {
                    $("#input-sql").val(data.sql);
                }
            });
        });

    }
}

$(function () {
    _Manager = new Manager();
    _Manager.ManagerFormOption.beforeSubmit = _Manager.showRequest;
    _Manager.ManagerFormOption.success = _Manager.showResponse;
    _Manager.formManger.ajaxForm(_Manager.ManagerFormOption);

    if (_Manager.seletorSqlAttach.length) {
        _Manager.selectSql(_Manager);
    }
    // if (_Manager.seletorAttach.length) {
    //     _Manager.selectImgPreview(_Manager);
    // }

    _Manager.seletorAttach.change(function (event) {
        _Manager.selectImg(event, _Manager);
    });
    // _Manager.seletorSqlAttach.change(function (event) {
    //     _Manager.selectImg(event, _Manager);
    // });



})