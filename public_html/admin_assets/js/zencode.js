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
    selectArquivo(_this) {
        if (_this.val()!=="" && $("#modulo").val()) {
           var url=_this.val()+"/"+$("#modulo").val();
            $.getJSON(url, function (data) {
                var new_file= {id:data.acao, text: data.data, syntax: 'php'};
			    editAreaLoader.openFile('description', new_file);
                $("#caminho").val(data.caminho);
            });
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

    $('#class').on('change', function () {
        _Zen.selectArquivo($(this));
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
            _Zen.selectClass($('.select-table'));
        }
        else{
            $(this).addClass('warning');
            $(this).children('.hidden-xs').text('RESTAURAR CLASS?');
            var eu=$(this);
             setTimeout(function () {
               eu.removeClass('warning');
                eu.children('.hidden-xs').text('GERAR');
            }, 10000);
        }

    });
    //Instania o formulario
    _Zen.ZenCodeFormOption.beforeSubmit = _Zen.showRequest;
    _Zen.ZenCodeFormOption.success = _Zen.showResponse;
    _Zen.formZenCode.ajaxForm(_Zen.ZenCodeFormOption);
})

// callback functions
		function my_save(id, content){
			alert("Here is the content of the EditArea '"+ id +"' as received by the save callback function:\n"+content);
		}