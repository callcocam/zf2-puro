class Dlls extends SIGAMessages {
    constructor() {
        super();
        this.formDdl = $(".formDdl");
        this.input = $('.select-tabela');
        this.colunm = $("#colunas");
        this.tabelaAdd=$("#tabela-add");
        this.tabelaChange=$("#tabela-change");
        this.tabelaDropCol=$("#tabela-brop-coluna");
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
        $(_this.target).empty().removeClass(_this.classeResult);
        return true;
    }; // post-submit callback 

    showResponse(responseText, statusText, xhr, $form) {
        $(_this.carregando).hide('fast');
        _this.messageSiga(responseText.msg, responseText.class);
        _this.result = responseText.result;
        //console.log(responseText.action);
        if ($(responseText.action).length) {
            //responseText.action vem do controller
            if (responseText.result) {
                $(responseText.action).change();
            }
        }
        if ($(responseText.action_add).length) {
            //responseText.action vem do controller
            if (responseText.result) {
                $(responseText.action_add).change();
            }
        }
    }

}

var _this = new Dlls();
//Instania o formulario
_this.ajaxFormOption.beforeSubmit = _this.showRequest;
_this.ajaxFormOption.success = _this.showResponse;
_this.formDdl.ajaxForm(_this.ajaxFormOption);

//Aciona o event change do input
_this.input.change(function () {
    _this.colunms($(this), _this.colunm);
});
//Aciona o event change do input
_this.tabelaAdd.change(function () {
    _this.colunms($(this), "#after-add");
});

//Aciona o event change do input
_this.tabelaChange.change(function () {
    _this.colunms($(this), ".coluna-change");
});


//Cria um atalho para regarregar os select de tabela
$("#change").change(function () {
    _this.populaTabela($('.drop-column'));
    _this.populaTabela($('.drop-table'));
    _this.populaTabela($('.change-column'));
    _this.populaTabela($('.add-column'));
});
