$(function () {
    var myarray = [];
    // Função para a geração dos arquivos do controller app
    $('.btn-generate').click(function ()
    {
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function (xhr) {
                carregando($(this).attr('title'));
            },
            success: function (data)
            {
                msg(data.msg);
            }
        });
        return false;
    });

    $("#generateArquivo").submit(function ()
    {
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            beforeSend: function (xhr) {
                carregando($(this).attr('action'));
            },
            success: function (data)
            {
                msg(data.msg);
            }
        });
        return false;
    });


    $(".edit-field").click(function ()
    {
        $.ajax({
            url: $(this).attr("href"),
            success: function (data)
            {
                bootbox.dialog({
                    title: $('.title-campos').text(),
                    message: data,
                    buttons: {
                        success: {
                            label: "Save",
                            className: "btn-success",
                            callback: function () {
                                $.ajax({//ABRE O AJAX
                                    url: $("#form-config-campos").attr("action"),
                                    data: $("#form-config-campos").serialize(),
                                    type: "POST",
                                    dataType: "JSON",
                                    beforeSend: function () {//ABRE BEFORE
                                        $('.modal-footer').prepend("<span class='carregando pull-left'></span>");
                                    },
                                    success: function (data)
                                    {
                                        $('.carregando').hide();
                                        msg(data.msg);
                                    }
                                })// FECHA O AJAX
                                return false;
                            }
                        }
                    }
                });
                esconde($("#type").val());
            }
        });
        return false;
    });

    $("body").on('change', '#type', function () {
        esconde($(this).val());
    });
    $('.todo-list').sortable(
            {
                handle: ".handle",
                cursor: "move",
                distance: 5,
                containment: 'parent',
                tolerance: "pointer",
                stop: function (event, ui) {
                    myarray = [];
                    $(this).find('li').each(function (i) {
                        $(this).find('li:last').attr('id', i + 1);
                        myarray.push({
                            id: $(this).attr('id'),
                            value: i + 1
                        });
                    });
                    //console.log(myarray);
                    // habilita o Botão para ordenar os campos
                    $(".configuracoes-ordering").removeClass('disabled');
                }}).disableSelection();



    $("body").on('click', '.configuracoes-ordering', function () {
        $.ajax({
            url: $(this).attr('href'),
            type: 'POST',
            dataType: 'json',
            data: {ordering: myarray},
            success: function (data)
            {
                if (data.result === "1")
                {
                    $('.configuracoes-ordering').addClass('disabled');
                }
                msg(data.msg);
            }
        });
        return false;
    });
    $('.configuracoes-ordering').addClass('disabled');

    // função para excluir os registros
    $('.excluir').click(function () {
        console.log($(this).attr("id"));
        var seletor = $(this);
        bootbox.confirm("<strong>Opisss!</strong>, Deseja realmente excluir este registro?", function (result) {
            carregando();
            if (result) {
                $.ajax({
                    url: seletor.attr('href'),
                    success: function (data)
                    {
                        resultado(data.result, data.msg, seletor.attr('id'));
                    }
                });
            } else
            {
                Example.init({"selector": ".bb-alert-danger"});
                Example.show("Operação foi <strong>cancelada</strong> pelo usuario do sistma");
            }
        });
        return false;
    });

    
    // BLOCO DE GERAÇÃO DE TABELAS NO BANCO DE DADOS
    $("#geraTabelas").submit(function (e) {
        //prevent Default functionality
        e.preventDefault();
        //get the action-url of the form
        var actionurl = e.currentTarget.action;
        //do your own request an handle the results
        $.ajax({
            url: actionurl,
            type: 'post',
            dataType: 'json',
            data: $("#geraTabelas").serialize(),
            beforeSend: function () {
                carregando(actionurl);
            },
            success: function (data) {
                $("#alert-geraTabelas").html(data.msg).fadeIn("slow", function ()
                {
                    bootbox.hideAll();
                    setTimeout(function () {
                        $("#alert-geraTabelas").fadeOut('fast', function ()
                        {
                            $("#alert-geraTabelas").html('');
                        });
                    }, 10000);
                });
            }
        });
    });
    var input = $('#attachment-sql');
    formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    input.bind('change', function () {
        this.files = null;
        $.each(this.files, function (index, value) {

            formdata.append('attachment', value);
            $.ajax({
                url: '/admin/app/getsql',
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

    });
    // FIM DO GERAR TABELAS


    $("body").on('click', '.j_add-value-options', function () {
        var campoCache = $(this).attr('data-id');
        bootbox.dialog({
            size: 'small',
            title: "This is a form in a modal.",
            message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal" id="form-add-value-options"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Valor</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="valor_value_options" required="required" name="valor_value_options" type="text" placeholder="Entre com o valor que sera salvo na base" class="form-control input-md"> ' +
                    ' </div> </div> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="label">Rotulo</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="rotulo_value_options"  required="required"  name="rotulo_value_options" type="text" placeholder="Valor que sera visivel" class="form-control input-md"> ' +
                    '</div> </div> ' +
                    '<input type="hidden" name="campoCache" value="' + campoCache + '"/>' +
                    '</form> </div></div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        if ($("#valor_value_options").val() == "" || $("#rotulo_value_options").val() == "")
                        {
                            alert("preencha os campos com o valor e o Rotulo");
                            return false;
                        }
                        $.ajax({
                            url: '/admin/app/add-value-options',
                            type: 'POST',
                            dataType: 'json',
                            data: $("#form-add-value-options").serialize(),
                            success: function (data)
                            {
                                console.log(data.valor);
                                $("#" + campoCache).val(data.valor);
                                $("#valor_value_options").val("");
                                $("#rotulo_value_options").val("");
                            }
                        });
                        return false;
                    }
                }
            }
        }
        );
    });

    $('body').on('click', '.j_limpa-value-options', function () {
        var campoCache = $(this).attr('data-id');
        $.ajax({
            url: '/admin/app/limpa-value-options',
            type: 'POST',
            data: {'campoCache': campoCache},
            dataType: 'json',
            success: function ()
            {
                $("#" + campoCache).val("");
            }
        });
    });

//
//    $(".form-moderar").submit(function()
//    {
//
//        $.ajax({
//            url: $(this).attr('action'),
//            type: 'post',
//            dataType: 'JSON',
//            data: $(this).serialize(),
//            beforeSend: function() {
//                carregando();
//            },
//            success: function(data)
//            {
//                msg(data.msg);
//            }
//        });
//        return false;
//    });

    $(".tradutor-refresh").click(function ()
    {
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'JSON',
            beforeSend: function () {
                carregando($(this).attr('href'));
            },
            success: function (data)
            {
                msg(data.msg);
            }
        });
        return false;
    });
    if ($('select').length) {
        $('select').chosen({width: "100%"});
    }
    if ($('.fancybox').length) {
        $(".fancybox").fancybox();
    }

});


function esconde(val)
{
    console.log(val);
    if (val === "hidden")
    {
        val = "oculto";
    }
    $('.geral').parent().fadeIn("fade");
    $('.' + val).parent().fadeOut("slow");
}