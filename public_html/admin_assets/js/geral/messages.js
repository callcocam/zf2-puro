/**
 * This tiny script just helps us demonstrate
 * what the various example callbacks are doing
 */
var Example = (function () {
    "use strict";

    var elem,
            hideHandler,
            that = {};

    that.init = function (options) {
        elem = $(options.selector);
    };

    that.show = function (text) {
        clearTimeout(hideHandler);

        elem.find("span").html(text);
        elem.delay(200).fadeIn(function()
        {
           bootbox.hideAll(); 
        }).delay(4000).fadeOut();
    };
     $('body').css('padding-right',"0");
    return that;
}());

function resultado(result, msg, seletor)
{
     $('body').css('padding-right',"0");
    if (!result)
    {
        Example.init({"selector": ".bb-alert-danger"});
        Example.show(msg);
    } else
    {
        Example.init({"selector": ".bb-alert-success"});
        Example.show(msg);
        $("." + seletor).fadeOut('slow');
    }
}


/**
 * Dialogo padrão para o efeito carregando
 */
function carregando(texto)
{
     $('body').css('padding-right',"0");
    bootbox.dialog({
        /**
         * @required String|Element
         */
        message: '<img class="carregando-load" src="/img/load.gif"><br>'+texto
    });
}
/**
 * Menssagem padrão para as ações do sistema via ajax
 * @param {string} msg="Resposta que retornou de uma ação"
 */
function msg(msg)
{ 
     $('body').css('padding-right',"0");
    bootbox.alert({
        /**
         * @required String|Element
         */
        message: msg,
        /**
         * @optional String|Element
         * adds a header to the dialog and places this text in an h4
         */
        title: "RESPOSTA DO SISTEMA",
        callback: function() {
            bootbox.hideAll();
        }

    });
    
}