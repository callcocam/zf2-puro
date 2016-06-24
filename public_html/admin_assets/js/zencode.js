class ZenCode extends SIGAMessages {
    constructor() {
        super();
        this.formZenCode = $(".form-zen-code");
        this.ZenCodeFormOption = {
            beforeSubmit: null, // pre-submit callback 
            success: null, // post-submit callback 
            type: 'post', // 'get' or 'post', override for form's 'method' attribute 
            dataType: 'json' // 'xml', 'script', or 'json' (expected server response type) 
        };
    }
    selectArquivo(_this, _AppAjax) {
        if (_this.val() !== "" && $("#modulo").val()) {
            var url = _this.val() + "/" + $("#modulo").val();
            $.ajax({
                url: url, //$(this).attr('href'),
                type: 'GET',
                dataType: 'json',
                beforeSend: function (xhr) {

                    $(_AppAjax.carregando).fadeIn('fast');
                },
                success: function (data) {
                    $(_AppAjax.carregando).hide('fast');
                    $(_AppAjax.boxCarregando).fadeIn('fast');
                    _AppAjax.messageSiga(data.msg, data.class);
                    _AppAjax.resultAction = data.result;
                    editAreaLoader.setValue('description', data.data);
                    $("#caminho").val(data.caminho);
                    $("#id").val(data.id);
                    // var new_file= {id:data.acao, text: data.data, syntax: 'php', title: data.caminho};
                    // editAreaLoader.openFile('description', new_file);
                }
            });
        }
    }
    showRequest(formData, jqForm, options) {
        $(_this.carregando).fadeIn('fast');
        $(_this.target).empty().removeClass(_this.classeResult);
        return true;
    }; // post-submit callback 

    showResponse(responseText, statusText, xhr, $form) {
        $(_this.carregando).hide('fast');
        _this.messageSiga(responseText.msg, responseText.class);
        _this.result = responseText.result;
        //console.log(responseText.action);
        if ($(responseText.action).length) {
            if (responseText.result) {
                $(responseText.action).change();
            }
        }
    }
}

$(function () {
    _Zen = new ZenCode();
    $('#class').on('change', function () {
        if (typeof _AppZen == "undefined") {
            _AppZen = new App();
        }
        _Zen.selectArquivo($(this), _AppZen);
    });

    $('#refresh-zen-code').on('click', function () {
        if ($("#class").val() !== "" && $("#modulo").val()) {
        if ($(this).hasClass('warning')) {
            if (typeof _AppZen == "undefined") {
                _AppZen = new App();
            }
            _AppZen.ajaxFunction("/zen-code/zen-code/refresh", 'post', 'json', _Zen.formZenCode.serialize(), _AppZen);
            $(this).removeClass('warning');
            $(this).val('RESTAURAR');
            //_Zen.selectClass($('.select-table'));
        }
        else {
            $(this).addClass('warning');
            $(this).val('RESTAURAR CLASS?');
            var eu = $(this);
            setTimeout(function () {
                eu.removeClass('warning');
                eu.val('RESTAURAR');
            }, 10000);
        }}

    });
    //Instania o formulario
    _Zen.ZenCodeFormOption.beforeSubmit = _Zen.showRequest;
    _Zen.ZenCodeFormOption.success = _Zen.showResponse;
    _Zen.formZenCode.ajaxForm(_Zen.ZenCodeFormOption);
})

// callback functions
function my_save(id, content) {
    if ($("#class").val() !== "" && $("#modulo").val()) {
    $("#" + id).val($.trim(content));
    _Zen.formZenCode.submit();
    }
}
