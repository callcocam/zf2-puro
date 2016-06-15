class Dlls extends SIGAMessages {
    constructor() {
        super();
        this.formDdl = $(".formDdl");
        this.input = $('.select-tabela');
        this.colunm = $("#colunas");
        this.action = "";
        this.result = null;
        this.tabelasBd = ".select-tabela";
        this.ajaxFormOption = {
            beforeSubmit: null, // pre-submit callback 
            success: null, // post-submit callback 
            type: 'post', // 'get' or 'post', override for form's 'method' attribute 
            dataType: 'json' // 'xml', 'script', or 'json' (expected server response type) 
        };

    }

    colunms(eu, seletor) {
        $(seletor).find('option').remove();
        $(seletor).append($("<option />").val('').text("--Selecione--"));
        if (eu.val() !== "") {
            $(this.carregando).fadeIn('slow');
            $.ajax({
                url: '/ddl/ddl/columns',
                data: {
                    tabela: eu.val()
                },
                error: function () {
                    _this.messageSiga('An error has occurred', 'trigger_error');
                },
                dataType: 'json',
                success: function (data) {
                    _this.messageSiga(data.msg, data.class);
                    if (data.result) {
                        $.each(data.result, function () {
                            $(seletor).append($("<option />").val(this.name).text(this.name));
                        });
                    }

                },
                type: 'GET'
            });
        }

    }

    populaTabela(seletor) {
        $(seletor).find('option').remove();
        $(seletor).append($("<option />").val('').text("--Selecione--"));
        $.each(_this.result, function (i, v) {
            $(seletor).append($("<option />").val(v).text(v));

        });
    }

    showRequest(formData, jqForm, options) {
        $(_this.carregando).fadeIn('fast');
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

var _this = new Dlls();

_this.ajaxFormOption.beforeSubmit = _this.showRequest;
_this.ajaxFormOption.success = _this.showResponse;
_this.formDdl.ajaxForm(_this.ajaxFormOption);
_this.input.change(function () {
    _this.colunms($(this), _this.colunm);
});
$("#change").change(function () {
    _this.populaTabela($('.drop-column'));
    _this.populaTabela($('.drop-table'));
    _this.populaTabela($('.change-column'));
    _this.populaTabela($('.add-column'));
});