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
    selectClass(_this) {
        if (_this.prop('checked')) {
            $.getJSON(_this.val(), function (data) {
                $("#form-class").val(data.form);
                $("#caminho-form").val(data.caminhoform);

                $("#model-class").val(data.model);
                $("#caminho-model").val(data.caminhomodel);

                $("#table-class").val(data.table);
                $("#caminho-table").val(data.caminhotable);
                
                $("#filter-class").val(data.filter);
                $("#caminho-filter").val(data.caminhofilter);

            });
        } else {
            console.log("No Chek");
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
    $('.select-table').on('change', function () {
        _Zen.selectClass($(this));
    });

    $('.generate').on('click', function (event) {
        event.preventDefault();
        if ($(this).hasClass('warning')) {
            if (typeof _AppZen == "undefined") {
                _AppZen = new App();
            }
            _AppZen.ajaxFunction($(this).attr('href'), 'get', 'json', '', _AppZen);
            $(this).removeClass('warning');
            $(this).text('GERAR');
        }
        else{
            $(this).addClass('warning');
            $(this).text('RESTAURAR CLASS?');
        }

    });
    //Instania o formulario
    _Zen.ZenCodeFormOption.beforeSubmit = _Zen.showRequest;
    _Zen.ZenCodeFormOption.success = _Zen.showResponse;
    _Zen.formZenCode.ajaxForm(_Zen.ZenCodeFormOption);
})