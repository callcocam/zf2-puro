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
        elem.delay(200).fadeIn().delay(4000).fadeOut();
    };

    return that;
}());

function resultado(result, msg, seletor)
{
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
