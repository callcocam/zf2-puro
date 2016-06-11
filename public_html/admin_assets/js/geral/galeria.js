//Ecluir item da galeria
$('.excluircarrousel').click(function ()
{
//    $($(this).attr('id')).remove();
//    $(".carousel").carousel();
   var dados;
     dados=$(".form-geral").serialize();
    $.ajax({
        url: $(this).attr('href'),
        type: 'POST',
        dataType: 'JSON',
        data:dados,
        beforeSend: function (xhr) {
            carregando("Arguarde");
        },
        success: function (data)
        {
            msg(data.msg);
            $("#galeria").val(data.galeria);
        }
    });
    return false;
});