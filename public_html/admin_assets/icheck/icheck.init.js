class AppIcheck extends SIGAMessages {
    constructor() {
        super();
        }

        //esconde repete periodos qtdade 
        escondeContaPagaRecebida(_this)
        {
             if( _this.eq(0).attr('checked'))
              {
                $('.cl-paga').fadeOut('slow');
                $('.cl-repete').fadeOut('slow');
                $('#publish_up').val($.formatDateTime('dd-mm-yy hh:ii:ss', new Date()));
                $('input:radio[name="repete"]').eq(0).attr('checked',true).iCheck('check');
                $('#qtdade').val(1);
                $('#periodos').val('');

              }
              else
              {
                $('.cl-paga').fadeIn('slow');
               
                
              }
        }
        escondeRepete(_this)
        {
          if(_this.eq(0).attr('checked'))
          {
            $("#qtdade").val(1);
            $('#periodos').val(3);
            $('.cl-repete').fadeOut('slow');
          }else{
            $('.cl-repete').fadeIn('slow');
                 $("#qtdade").val(2);
                 $('#periodos').val('4');
             if(_this.val()==2){
                 $("#qtdade").val(12);
                 $('#periodos').val('4');
             }
          }
        }
}

$(function ()
{
    $('input[type=radio]').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        //increaseArea: '20%' // optional
    });

  
    //Js class AppIcheck
    _thisCheck=new AppIcheck();
    _thisCheck.escondeContaPagaRecebida($('input:radio[name=situacao]:checked'));

     $('.situacao').on('ifChecked', function(event){
        _thisCheck.escondeContaPagaRecebida($(this));
    });
     $('.repete').on('ifChecked', function(event){
        _thisCheck.escondeRepete($(this));
    });

    
    //Js class App
    _AppChek=new App();
    _AppChek.escondeBanco($('input:radio[name=conta_tipo]:checked').val());

    $('input:radio[name=conta_tipo]').on('ifChecked',function() {
          _AppChek.escondeBanco($(this).val());
    });
    
    
});

