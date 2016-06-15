$.Admin = {};
var options = null;
$.Admin.options = {
    navbarMenuSlimscroll: true,
    navbarMenuSlimscrollWidth: "4px", //The width of the scroll bar
    navbarMenuHeight: "500px", //The height of the inner menu
    animationSpeed: 300,
    btnExcluir: ".excluir",
    resultAction: false,
    uploadPreview: {
        seletor: '#attachment',
        seletorSql: "#attachmentSql",
        preview: '.preview_IMG',
        fileText: '.file-text',
        wd: "418",
        hg: "251",
        selectImg: function (event)
        {
            $(this.preview).attr({
                src: URL.createObjectURL(event.target.files[0]),
                width: this.wd,
                height: this.hg
            });
            $(this.fileText).text(event.target.value.split('\\').pop());

        }
        ,
        selectSql: function (options)
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
                    url: '/admin/admin/getsql',
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
    tabs: {
        nav: '.nav-tabs',
        content: '.tab-pane',
        active: 'ui-state-active',
        parentLinks: ".tabLink",
        current: function (options)
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
            linksParent.on('click', options.tabs.parentLinks, function (event) {
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
    generateClass: {
        btn: '.btn-generate'
    },
    ajaxFunction: function (url, method, type, data)
    {
        $.ajax({
            url: url, //$(this).attr('href'),
            type: method, //'GET',
            dataType: type,
            data: data,
            beforeSend: function (xhr) {

                $(optionsForm.options.carregando).fadeIn('fast');
            },
            success: function (data)
            {
                $(optionsForm.options.carregando).hide('fast');
                $(optionsForm.options.boxCarregando).fadeIn('fast');
                optionsForm.message(data.msg, data.class);
                options.resultAction = data.result;
            }
        });
    },
    excluir: function (_this)
    {
        if (_this.hasClass('btn-blue')) {
            _this.removeClass('btn-blue');
            _this.addClass('btn-red');
            _this.children('.hidden-xs').text('CONFIMAR');
            setTimeout(function () {
                _this.addClass('btn-blue');
                _this.removeClass('btn-red');
                _this.children('.hidden-xs').text('EXCLUIR');
            }, 10000);
        } else
        {
            options.ajaxFunction(_this.attr('href'), 'get', 'json', '');
            setTimeout(function () {
                if (options.resultAction) {
                    _this.parent().parent().parent('.col-box-list').remove();
                }
            }, 3000);

        }
    },
    optionsSort: {
        seletor: ".todo-list",
        myarray: [],
        MySortable: function ()
        {
            $(this.seletor).sortable(
                    {
                        handle: ".handle",
                        cursor: "move",
                        distance: 5,
                        containment: 'parent',
                        tolerance: "pointer",
                        stop: function (event, ui) {
                            options.optionsSort.myarray = [];
                            $(this).find('li').each(function (i) {
                                $(this).find('li:last').attr('id', i + 1);
                                options.optionsSort.myarray.push({
                                    id: $(this).attr('id'),
                                    value: i + 1
                                });
                            });
                            options.ajaxFunction('/admin/app/configuracoesordering', 'post', 'json', {ordering: options.optionsSort.myarray});
                        }
                    }).disableSelection();
        }
    },
    appElements: {
        seletor: "#type",
        parente: "div",
        esconde: function () {
            var cl = $(this.seletor).val();
            $('form .geral').removeClass('box-red').parent('div').fadeIn('fast');
            $('form input, select, textarea, checkbox, radio, date, email').each(function (i) {
                // Aplica a cor de fundo
                if ($(this).hasClass(cl))
                {
                    $(this).addClass('box-red').parent('div').fadeOut('fast');
                }
            });
        }
    }
}

