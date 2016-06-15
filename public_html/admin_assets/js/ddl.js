var select = {
    input: '.select-tabela',
    classeResult: '',
    carregando: '.carregando',
    boxCarregando: '.box-carregando',
    target: '#alert',
    colunas: "#colunas",
    form: ".formDdl",
    action: "",
    result: null,
    tabelasBd: ".select-tabela",
    popula: function ()
    {
        _this = this;
        $(this.input).change(function ()
        {
            $(select.colunas).find('option').remove();
            $(select.colunas).append($("<option />").val('').text("--Selecione--"));
            if ($(this).val() !== "") {
                $(select.carregando).fadeIn('slow');
                _this.ajax($(this));
            }

        });
    },
    ajax: function (_this)
    {
        $.ajax({
            url: '/ddl/ddl/tabela',
            data: {
                tabela: _this.val()
            },
            error: function () {
                alert('<p>An error has occurred</p>');
            },
            dataType: 'json',
            success: function (data) {
                select.message(data.msg, data.class);
                $(select.colunas).find('option').remove();
                $(select.colunas).append($("<option />").val('').text("--Selecione--"));
                $.each(data.result, function () {
                    $(select.colunas).append($("<option />").val(this.name).text(this.name));
                });
            },
            type: 'GET'
        });

    },
    message: function (msg, classe)
    {
        select.classeResult = classe;
        $(select.carregando).fadeOut('fast');
        $(select.target).addClass(classe).html(msg).fadeIn('fast', function () {
            setTimeout(select.esconde(classe), 5000);
        });
    },
    esconde: function (classe)
    {
        $(select.target).fadeOut('fast', function () {
            $(select.boxCarregando).fadeOut('slow');
            $(select.target).empty().removeClass(classe);
        });
    },
    options: {
        beforeSubmit: null, // pre-submit callback 
        success: null, // post-submit callback 
        type: 'post', // 'get' or 'post', override for form's 'method' attribute 
        dataType: 'json' // 'xml', 'script', or 'json' (expected server response type) 
    },
    showRequest: function (formData, jqForm, options) {
        $(select.carregando).fadeIn('fast');
        return true;
    }, // post-submit callback 
    showResponse: function (responseText, statusText, xhr, $form) {
        $(select.carregando).hide('fast');
        select.message(responseText.msg, responseText.class);
        select.result = responseText.result;
        //console.log(responseText.action);
        if ($(responseText.action).length) {
            $(responseText.action).change();
        }


    },
    populaTabela: function ()
    {
        $('.drop-column').find('option').remove();
        $('.drop-column').append($("<option />").val('').text("--Selecione--"));
        $('.drop-table').find('option').remove();
        $('.drop-table').append($("<option />").val('').text("--Selecione--"));
        $('.change-column').find('option').remove();
        $('.change-column').append($("<option />").val('').text("--Selecione--"));
        $('.add-column').find('option').remove();
        $('.add-column').append($("<option />").val('').text("--Selecione--"));
        $.each(select.result, function (i, v) {
            $('.drop-column').append($("<option />").val(v).text(v));
            $('.drop-table').append($("<option />").val(v).text(v));
            $('.change-column').append($("<option />").val(v).text(v));
            $('.add-column').append($("<option />").val(v).text(v));
        });
    }
}
$(function () {

    select.popula();
    select.options.beforeSubmit = select.showRequest;
    select.options.success = select.showResponse;
    $(select.form).ajaxForm(select.options);
    //Função atalho aciona na hora que cria ou exclui uma table
    $("#change").change(function () {
        select.populaTabela();
    });

});