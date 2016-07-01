class AppIcheck extends SIGAMessages {
    constructor() {
        super();
        }

        //esconde repete perildo qtdade 
        escondeContaPagaRecebida(_this)
        {
              
              if(_this.val()==="0")
              {
                $('.cl-paga').fadeOut('slow');
                $('input:radio[name="repete"]').eq(0).attr('checked',true).iCheck('check');
                $('#qtdade').val(1);
                $('#perildo').val('');

              }
              else
              {
                $('.cl-paga').fadeIn('slow');
               
                
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

    
    //Js class App
    _AppChek=new App();
    _AppChek.escondeBanco($('input:radio[name=conta_tipo]:checked').val());

    $('input:radio[name=conta_tipo]').on('ifChecked',function() {
          _AppChek.escondeBanco($(this).val());
    });
    
    
});

