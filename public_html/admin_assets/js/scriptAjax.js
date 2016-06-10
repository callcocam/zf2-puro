$.Admin = {};
var options=null;
$.Admin.options = {
	navbarMenuSlimscroll: true,
	navbarMenuSlimscrollWidth: "4px", //The width of the scroll bar
	navbarMenuHeight: "500px", //The height of the inner menu
	animationSpeed:300,
	btnExcluir:".excluir",
	resultAction:false,
	//Mobile funcoes e parametros
	mobile:{
	marginLeft:240,
	outerWidth:0,
	wd:0,
	mainTop:60,
	mobile_action:'.mobile-action',
	mobile_active:'mobile-active',
	sidebar:'.main-sidebar',
	contentLeft:'.content-left',
	sidebarOpen:'sidebar-open',
	contentRight:'.content-right',
	contentOpen:'content-control',
	footer:'.main-footer',
	mainContent:".main-content",
	rzWidth:function()
	{
		this.outerWidth=$(window).width();
		this.wd=(parseInt(this.outerWidth)-this.marginLeft);
		
		if(this.outerWidth>1024){
			$(this.mobile_action).addClass(this.mobile_active);
			$(this.contentLeft).addClass(this.sidebarOpen);
			$(this.contentRight).addClass(this.contentOpen);
			}
		else{
			$(this.mobile_action).removeClass(this.mobile_active);
			$(this.contentLeft).removeClass(this.sidebarOpen);
			$(this.contentRight).removeClass(this.contentOpen);
		}
		if(this.outerWidth>480){
			
			$('.main-header-top-right').css('width',this.wd);
		}
		else
		{ 
			$('.main-header-top-right').css('width',this.outerWidth);
		}

		this.rzHeight();
		
		
	},
	rzHeight:function()
	{
		
		var neg = parseInt($(this.mainContent).css('padding-top'))+parseInt($(this.mainContent).css('padding-bottom'));
		var main_height = $(this.mainContent).outerHeight();
		var sidebar_height = $(this.contentLeft).outerHeight();
		var postSetWidth;
		if (main_height >= sidebar_height) {
		$(this.contentLeft).css('min-height', main_height + 30);
		postSetWidth = main_height + neg;
		} else {
		$(this.contentLeft).css('min-height', sidebar_height);
		postSetWidth = sidebar_height;
		}
		// console.clear();
		// console.log(parseInt(neg));
		// console.log(main_height);
		
	},
    open:function (){
      if(!$(this.mobile_action).hasClass(this.mobile_active)){
         $(this.mobile_action).addClass(this.mobile_active);
         $(this.contentLeft).addClass(this.sidebarOpen);
         $(this.contentRight).addClass(this.contentOpen);
          }else{
         $(this.mobile_action).removeClass(this.mobile_active);
         $(this.contentLeft).removeClass(this.sidebarOpen);
         $(this.contentRight).removeClass(this.contentOpen);
         } 
       
    }
   }, // FIM MOBILE
   scroll:function()
   {
   	if (this.navbarMenuSlimscroll && typeof $.fn.slimscroll != 'undefined') {
		$(this.mobile.sidebar).slimscroll({
		height: this.navbarMenuHeight,
		alwaysVisible: false,
		size: this.navbarMenuSlimscrollWidth
		}).css("width", "100%");
	}
   },
   treeview:{
   	menu:'.main-sidebar li a',
   	seletor:'.sidebar-sub',
   	active:'active',
   	open:'menu-open',
	openMenu:function(menu)
	   {
	/* Tree()
   * ======
   * Converts the sidebar into a multilevel
   * tree view menu.
   *
   * @type Function
   * @Usage: $.Admin.treeview.openMenu('.sidebar')
   */
    var animationSpeed = options.animationSpeed;
    $(document).on('click', menu, function (e) {
      //Get the clicked link and the next element
      var $this = $(this);
      var checkElement = $this.next();
       //Check if the next element is a menu and is visible
      if ((checkElement.is(options.treeview.seletor)) && (checkElement.is(':visible'))) {
        //Close the menu
        checkElement.slideUp(animationSpeed, function () {
          checkElement.removeClass(options.treeview.open);
          });
        checkElement.parent("li").removeClass(options.treeview.active);
      }
      //If the menu is not visible
      else if ((checkElement.is(options.treeview.seletor)) && (!checkElement.is(':visible'))) {
        //Get the parent menu
        var parent = $this.parents('ul').first();
        //Close all open menus within the parent
        var ul = parent.find('ul:visible').slideUp(animationSpeed);
        //Remove the menu-open class from the parent
        ul.removeClass(options.treeview.open);
        //Get the parent li
        var parent_li = $this.parent("li");

        //Open the target menu and add the menu-open class
        checkElement.slideDown(animationSpeed, function () {
          //Add the class active to the parent li
          checkElement.addClass(options.treeview.open);
          parent.find('li.'+options.treeview.active).removeClass(options.treeview.active);
          parent_li.addClass(options.treeview.active);
         });
      }
      //if this isn't a link, prevent the page from being redirected
      if (checkElement.is(options.treeview.seletor)) {
        e.preventDefault();
      }
    });
   } 
 },
  uploadPreview:{
	   	seletor:'#attachment',
	   	seletorSql:"#attachmentSql",
     	preview:'.preview_IMG',
     	fileText:'.file-text',
	   	wd:"418",
	   	hg:"251",
	   	selectImg:function(event)
	   	{
	   		$(this.preview).attr({
	   			src: URL.createObjectURL(event.target.files[0]),
	   			width: this.wd,
	   			height:this.hg
	   		});
	   		$(this.fileText).text(event.target.value.split('\\').pop());

	   	}
	   	,
	   	selectSql:function(options)
	   	{
			var input = $(options.uploadPreview.seletorSql);
			formdata = false;
			if (window.FormData) {
			formdata = new FormData();
			}
			input.bind('change', function () {
			this.files = null;
			formdata.append('attachment', this.files[0]);
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

	   	}
	   },
	   tabs:{
	   	nav:'.nav-tabs',
        content:'.tab-pane',
        active:'ui-state-active',
        parentLinks:".tabLink",
	   	current:function(options)
	   	{
			// Cachear el contenedor de los links
			var linksParent = $(options.tabs.nav);
			// Cachear cada uno de los links
			var links = linksParent.find('a');
			// Cachear cada uno de los items
			var items = $(options.tabs.content);
			// Añadir la clase "active" al primer link y al primer contenido 
			links.eq(0).add(items.eq(0)).parent('li').addClass(options.tabs.active);
			// Evento clic en el contendor de los links, delegado a los links 
			linksParent.on('click', options.tabs.parentLinks, function(event) {
			event.preventDefault();
			// Cachear el link en el que se hace clic 
			var t = $(this).parent('li'); 
			// Cachear la posición del link en el que se ha hecho clic
			var i = t.index();
			// Al link y a su respectivo contenido se le añade la clase
			// active y a sus hermanos se les quita dicha clase 
			t.add(items.eq(i)).addClass(options.tabs.active).siblings().removeClass(options.tabs.active); 
			}); 
	   	}
	   },
	   generateClass:{
	   btn:'.btn-generate'
	   },
		ajaxFunction:function(url,method,type,data)
		{
	     			$.ajax({
			            url: url,//$(this).attr('href'),
			            type: method,//'GET',
			            dataType: type,
			            data:data,
			            beforeSend: function (xhr) {
			               $(optionsForm.options.boxCarregando).fadeIn('fast');
			            },
			            success: function (data)
			            {
			                optionsForm.message(data.msg,data.class);
			                options.resultAction=data.result;
			            }
			        });
		},
		excluir:function(_this)
		{
			if(_this.hasClass('btn-blue')){
    		_this.removeClass('btn-blue');
    		_this.addClass('btn-red');
    		_this.children('.hidden-xs').text('CONFIMAR');
    		setTimeout(function() {
    			_this.addClass('btn-blue');
	    		_this.removeClass('btn-red');
	    		_this.children('.hidden-xs').text('EXCLUIR');
    		}, 10000);
	    	}
	    	else
	    	{
	    		options.ajaxFunction(_this.attr('href'),'get','json','');
	    		setTimeout(function() {
	    			if(options.resultAction){
	    				_this.parent().parent().parent('.col-box-list').remove();
	    			}
	    		}, 5000);

	    	}
		},
		optionsSort:{
			seletor:".todo-list",
			myarray: [],
			MySortable:function()
			{
				$(this.seletor).sortable(
				{
					handle: ".handle",
					cursor: "move",
					distance: 5,
					containment: 'parent',
					tolerance: "pointer",
					stop: function (event, ui) {
						options.optionsSort.myarray=[];
						$(this).find('li').each(function (i) {
							$(this).find('li:last').attr('id', i + 1);
								options.optionsSort.myarray.push({
								id: $(this).attr('id'),
								value: i + 1
							});
						});
						options.ajaxFunction('/admin/app/configuracoesordering','post','json',{ordering: options.optionsSort.myarray});
					}
				}).disableSelection();
			}
		},
		appElements:{
			seletor:"#type",
			parente:"div",
			esconde:function () {
				var cl=$(this.seletor).val();
                    $('form .geral').removeClass('box-red').parent('div').fadeIn('fast');
                    $('form input, select, textarea, checkbox, radio, date, email').each(function(i){
                        // Aplica a cor de fundo
                        if($(this).hasClass(cl))
                        {
                        	$(this).addClass('box-red').parent('div').fadeOut('fast');
                        }
                    }); 
			}
		}
	} 



$.Form = {};
var optionsForm=null;
$.Form.optionsForm = {
	    form: 			"#Manager",
	    save: 			"#save",
	    save_copy: 		"#save_copy",
	    id: 			"#id",
	    codio: 			"#codio",
 		options:{ 
 		classeResult:     '',
 		carregando:     '',
 		boxCarregando:  '.box-carregando',
 		target:        	'#alert',   // target element(s) to be updated with server response 
        beforeSubmit:  	null,  // pre-submit callback 
        success:       	null,  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
         type:      'post',        // 'get' or 'post', override for form's 'method' attribute 
         dataType:  'json',        // 'xml', 'script', or 'json' (expected server response type) 
         //clearForm: false        // clear all form fields after successful submit 
         //resetForm: false        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
        // pre-submit callback 
    	},
        showRequest:function (formData, jqForm, options) { 
			// FormData é um array ; aqui nós usamos $ .param para convertê-lo a uma corda para exibi-lo
			// Mas o plugin forma faz isso para você automaticamente quando apresentar os dados
			// Var queryString = $ .param ( FormData );
			var queryString = $.param(FormData);
			// JqForm é um objeto jQuery encapsular o elemento de formulário. Para acessar o
			// Elemento DOM para o formulário de fazer isso:
			// Var formElement = jqForm [ 0 ] ;
             
			$(options.boxCarregando).fadeIn('fast');
			 // alert( ' Sobre a apresentar : \ n \ n' + queryString );
			// Aqui poderíamos retornar false para impedir que o formulário a ser apresentado;
			// Retornando outra coisa senão falsa permitirá que o envio de formulário para continuar
			return true; 
		},// post-submit callback 
        showResponse:function (responseText, statusText, xhr, $form)  { 
		    // Para as respostas normais de HTML, o primeiro argumento para a chamada de retorno sucesso
			// É propriedade responseText do objeto XMLHttpRequest
		     optionsForm.message(responseText.msg,responseText.class); 
		     $(optionsForm.id).val(responseText.result);
		     $(optionsForm.codigo).val(responseText.codigo);
		     // if(responseText.callback=="save_copy")
		     // {
		     // 	$(this.id).val("0");
		     // }
		    // $(this.save_copy).removeClass('disabled');
		     // optionsForm.options.resetForm=responseText.result;
		     // optionsForm.options.clearForm=responseText.result;  
		    // Se o método ajaxForm foi aprovada uma opções objeto com o tipo de dados
			// Propriedade definida como 'xml' , em seguida, o primeiro argumento para a chamada de retorno sucesso
			// É propriedade responseXML do objeto XMLHttpRequest
		 
		   	// Se o método ajaxForm foi aprovada uma opções objeto com o tipo de dados
			// Propriedade definida como ' json ' , em seguida, o primeiro argumento para a chamada de retorno sucesso
			// É o objeto de dados JSON retornado pelo servidor
		 
		    // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText.msg + 
		    //     '\n\nThe output div should have already been updated with the responseText.'); 
		},
		message:function(msg,classe)
		{
			optionsForm.options.classeResult=classe;
		     $(optionsForm.options.target).addClass(classe).html(msg).fadeIn('fast', function() {
		     	setTimeout(optionsForm.esconde, 1000);
		     });
		},
		esconde:function()
		{
			$(optionsForm.options.target).fadeOut('fast', function() {
				$(optionsForm.options.boxCarregando).fadeOut('slow');
			}).empty().removeClass(optionsForm.options.classeResult);
		}
}
   