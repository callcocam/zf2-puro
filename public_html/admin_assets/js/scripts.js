$(function() {
	//Extend options if external options exist
	if (typeof AdminOptions !== "undefined") {
		$.extend(true,
		$.Admin.options,
		AdminOptions);
	}
	//Easy access to options
	options = $.Admin.options;
	options.mobile.rzWidth();
	$(window).resize(function() {
		options.mobile.rzWidth();	
	});
	//CONTROLE DO MENU MOBILE
	$(options.mobile.mobile_action).click(function(event) {
		options.mobile.open();
		event.preventDefault();
	});

	options.scroll();
	options.treeview.openMenu(options.treeview.menu);

	$(options.uploadPreview.seletor).change(function(event) {
		options.uploadPreview.selectImg(event);
	});
	$(options.uploadPreview.seletorSql).change(function(event) {
		options.uploadPreview.selectImg(event);
	});
   if($("#tabs").length)
   {
   	options.tabs.current(options);
   }
   if($(options.uploadPreview.seletorSql).length)
   {
   	  options.uploadPreview.selectSql(options);
   }


   //Extend options if external options exist
	if (typeof optionsForm !== "undefined") {
		$.extend(true,
		$.Form.options,
		optionsForm);
	}
	//Easy access to options
	optionsForm = $.Form.optionsForm;
	// bind form using 'ajaxForm' 
	optionsForm.options.beforeSubmit=optionsForm.showRequest;
	optionsForm.options.success=optionsForm.showResponse;
	$(optionsForm.form).ajaxForm(optionsForm.options); 
    $(optionsForm.options.boxCarregando).hide();
    // Função para a geração dos arquivos do controller app
    $(options.generateClass.btn).click(function ()
    {
        options.ajaxFunction($(this).attr('href'),'get','json','');
        return false;
    });
     // Função para excluir
    $(options.btnExcluir).click(function ()
    {
    	var _this=$(this);
    	options.excluir(_this);
        return false;
    });

    if($(".fancybox").length){
    	
 		var _width="70%";
 		var _heigth="70%";
 		if($(window).outerWidth()<500)
 		{
          	 _width="90%";
 			 _heigth="90%";
 		}
 		console.clear();
        console.log(_width);
         console.log(_heigth);
    	$(".fancybox").fancybox({
		maxWidth	: 600,
		maxHeight	: 600,
		width		: _width,
		height		: _heigth
	});
    }
   if($(options.optionsSort.seletor).length)
	    {
	    	options.optionsSort.MySortable();
	    }

    if($("#type").length)
	    {
	    	options.appElements.esconde();
	    }

	    $(options.appElements.seletor).on('change', function(event) {
	    	event.preventDefault();
	    	options.appElements.esconde();
	    });

	    $('.link-ajuda').click(function(event) {
	    	event.preventDefault();
	    });

    
    
})