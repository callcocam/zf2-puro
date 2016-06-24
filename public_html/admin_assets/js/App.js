class App extends SIGAMessages {
    constructor() {
        super();
        //MOBILE VARIAVEIS
        this.marginLeft = 240;
        this.outerWidth = 0;
        this.wd = 0;
        this.mainTop = 60;

        this.mobile_active = 'mobile-active';
        this.contentOpen = 'content-control';
        this.sidebarOpen = 'sidebar-open';

        this.sidebar = $('.main-sidebar');
        this.mobile_action = $('.mobile-action');
        this.contentLeft = $('.content-left');
        this.contentRight = $('.content-right');
        this.footer = $('.main-footer');
        this.mainContent = $(".main-content");
        // FIM MOBILE

        //TREEVIEW
        this.menuTreeview = '.main-sidebar li a';
        this.seletorTreeview = $('.sidebar-sub');
        this.activeTreeview = 'active';
        this.openTreeview = 'menu-open';
        this.animationSpeed = 300;
        //FIM TREEVIEW

        //ELEMENTOS ESCONDE
        this.seletorElements = $("#type");
        this.parenteElements = "div";
        //FIM
        this.resultAction = null;
        this.btnGenerate = $('.btn-generate');
        this.btnExcluir = $(".excluir");
        //SORTABLE
        this.seletorSortable = $(".todo-list");
        this.myarray = [];
        //FIM
        //MY TABS
        this.navTabs = $('.nav-tabs');
        this.contentTabs = $('.tab-pane');
        this.activeTabs = 'ui-state-active';
        this.parentLinks = ".tabLink";
        //FIM
    }

    myTabs(_AppTab) {
        // Cachear el contenedor de los links
        var linksParent = _AppTab.navTabs;
        // Cachear cada uno de los links
        var links = linksParent.find('a');
        // Cachear cada uno de los items
        var items = _AppTab.contentTabs;
        // Añadir la clase "active" al primer link y al primer contenido 
        links.eq(0).add(items.eq(0)).parent('li').addClass(_AppTab.activeTabs);
        // Evento clic en el contendor de los links, delegado a los links 
        linksParent.on('click', _AppTab.parentLinks, function (event) {
            event.preventDefault();
            // Cachear el link en el que se hace clic 
            var t = $(this).parent('li');
            // Cachear la posición del link en el que se ha hecho clic
            var i = t.index();
            // Al link y a su respectivo contenido se le añade la clase
            // active y a sus hermanos se les quita dicha clase 
            t.add(items.eq(i)).addClass(_AppTab.activeTabs).siblings().removeClass(_AppTab.activeTabs);
        });
    }

    open() {
        if (!this.mobile_action.hasClass(this.mobile_active)) {
            this.mobile_action.addClass(this.mobile_active);
            this.contentLeft.addClass(this.sidebarOpen);
            this.contentRight.addClass(this.contentOpen);
        } else {
            this.mobile_action.removeClass(this.mobile_active);
            this.contentLeft.removeClass(this.sidebarOpen);
            this.contentRight.removeClass(this.contentOpen);
        }
    }

    rzWidth() {
        this.outerWidth = $(window).width();
        this.wd = (parseInt(this.outerWidth) - this.marginLeft);

        if (this.outerWidth > 1024) {
            this.mobile_action.addClass(this.mobile_active);
            this.contentLeft.addClass(this.sidebarOpen);
            this.contentRight.addClass(this.contentOpen);
        } else {
            this.mobile_action.removeClass(this.mobile_active);
            this.contentLeft.removeClass(this.sidebarOpen);
            this.contentRight.removeClass(this.contentOpen);
        }
        if (this.outerWidth > 480) {

            $('.main-header-top-right').css('width', this.wd);
        } else {
            $('.main-header-top-right').css('width', this.outerWidth - 20);
        }

        this.rzHeight();
    }

    rzHeight() {
        var neg = parseInt($(this.mainContent).css('padding-top')) + parseInt($(this.mainContent).css('padding-bottom'));
        var main_height = this.mainContent.outerHeight();
        var sidebar_height = this.contentLeft.outerHeight();
        if (main_height < $(window).outerHeight()) {
            main_height = $(window).outerHeight();
        }
        var postSetWidth;
        if (main_height >= sidebar_height) {
            this.contentLeft.css('min-height', main_height + 30);
            postSetWidth = main_height + neg;
        } else {
            this.contentLeft.css('min-height', sidebar_height);
            postSetWidth = sidebar_height;
        }

    }

    treeview(menu) {
        /* Tree()
           * ======
           * Converts the sidebar into a multilevel
           * tree view menu.
           *
           * @type Function
           * @Usage: $.Admin.treeview.openMenu('.sidebar')
           */
        var animationSpeed = this.animationSpeed;
        var seletorTreeview = this.seletorTreeview;
        var openTreeview = this.openTreeview;
        var activeTreeview = this.activeTreeview;

        $(document).on('click', menu, function (e) {
            //Get the clicked link and the next element
            var $this = $(this);
            var checkElement = $this.next();
            //Check if the next element is a menu and is visible
            if ((checkElement.is(seletorTreeview)) && (checkElement.is(':visible'))) {
                //Close the menu
                checkElement.slideUp(animationSpeed, function () {
                    checkElement.removeClass(openTreeview);
                });
                checkElement.parent("li").removeClass(activeTreeview);
            }
            //If the menu is not visible
            else if ((checkElement.is(seletorTreeview)) && (!checkElement.is(':visible'))) {
                //Get the parent menu
                var parent = $this.parents('ul').first();
                //Close all open menus within the parent
                var ul = parent.find('ul:visible').slideUp(animationSpeed);
                //Remove the menu-open class from the parent
                ul.removeClass(openTreeview);
                //Get the parent li
                var parent_li = $this.parent("li");

                //Open the target menu and add the menu-open class
                checkElement.slideDown(animationSpeed, function () {
                    //Add the class active to the parent li
                    checkElement.addClass(openTreeview);
                    parent.find('li.' + activeTreeview).removeClass(activeTreeview);
                    parent_li.addClass(activeTreeview);
                });
            }
            //if this isn't a link, prevent the page from being redirected
            if (checkElement.is(seletorTreeview)) {
                e.preventDefault();
            }
        });
    }

    escondeElements() {
        var cl = this.seletorElements.val();
        $('form .geral').removeClass('box-red').parent('div').fadeIn('fast');
        $('form input, select, textarea, checkbox, radio, date, email').each(function (i) {
            // Aplica a cor de fundo
            if ($(this).hasClass(cl)) {
                $(this).addClass('box-red').parent('div').fadeOut('fast');
            }
        });
    }

    excluir(_this, _AppExcluir) {
        if (_this.hasClass('btn-blue')) {
            _this.removeClass('btn-blue');
            _this.addClass('btn-red');
            _this.children('.hidden-xs').text('CONFIMAR');
            setTimeout(function () {
                _this.addClass('btn-blue');
                _this.removeClass('btn-red');
                _this.children('.hidden-xs').text('EXCLUIR');
            }, 10000);
        } else {
            _AppExcluir.ajaxFunction(_this.attr('href'), 'get', 'json', '', _AppExcluir);
            setTimeout(function () {
                if (_AppExcluir.resultAction) {
                    _this.parent().parent().parent('.col-box-list').remove();
                }
            }, 1000);

        }
    }

    ajaxFunction(url, method, type, data, _AppAjax) {
        var dataReturn = null;
        $.ajax({
            url: url, //$(this).attr('href'),
            type: method, //'GET',
            dataType: type,
            data: data,
            beforeSend: function (xhr) {

                $(_AppAjax.carregando).fadeIn('fast');
            },
            success: function (data) {
                $(_AppAjax.carregando).hide('fast');
                $(_AppAjax.boxCarregando).fadeIn('fast');
                _AppAjax.messageSiga(data.msg, data.class);
                _AppAjax.resultAction = data.result;
                if ($(data.action).length) {
                    if (data.result) {
                        $(data.action).change();
                    }
                }
                dataReturn = data;
            }
        });
        return dataReturn;
    }

    MySortable(_AppSortable) {
        $(_AppSortable.seletorSortable).sortable(
            {
                handle: ".handle",
                cursor: "move",
                distance: 5,
                containment: 'parent',
                tolerance: "pointer",
                stop: function (event, ui) {
                    _AppSortable.myarray = [];
                    $(this).find('li').each(function (i) {
                        $(this).find('li:last').attr('id', i + 1);
                        _AppSortable.myarray.push({
                            id: $(this).attr('id'),
                            value: i + 1
                        });
                    });
                    _AppSortable.ajaxFunction('/admin/app/configuracoesordering', 'post', 'json', { ordering: _AppSortable.myarray }, _AppSortable);
                }
            }).disableSelection();
    }




}


$(function () {
    var _App = new App();
    _App.rzWidth();
    $(window).resize(function () {
        _App.rzWidth();
    });
    //CONTROLE DO MENU MOBILE
    $(_App.mobile_action).click(function (event) {
        _App.open();
        event.preventDefault();
    });
    _App.treeview(_App.menuTreeview);

    // if (_App.seletorElements.length) {
    //     _App.escondeElements();
    // }

    // $(_App.seletorElements).on('change', function (event) {
    //     event.preventDefault();
    //     options.escondeElements();
    // });

    if (_App.seletorSortable.length) {
        _App.MySortable(_App);
    }

    if ($("#tabs").length) {
        _App.myTabs(_App);
    }

    $(_App.btnGenerate).click(function () {
        _App.ajaxFunction($(this).attr('href'), 'get', 'json', '', _App);
        return false;
    });
    // Função para excluir
    _App.btnExcluir.click(function () {
        var _this = $(this);
        _App.excluir(_this, _App);
        return false;
    });




    $("#created, #publish_down").datetimepicker({
        timepicker: false,
        format: 'd-m-Y',
        onChangeDateTime: function (dp, $input) {
            //alert($input.val());
        }
    });
    $.datetimepicker.setLocale('pt-BR');

    $('.link-ajuda').click(function (event) {
        event.preventDefault();
    });

    $(_App.carregando).hide();
    $(_App.boxCarregando).hide();

    if ($(".fancybox").length) {
        var _width = "70%";
        var _heigth = "70%";
        if ($(window).outerWidth() < 500) {
            _width = "90%";
            _heigth = "90%";
        }
        $(".fancybox").fancybox({
            maxWidth: 600,
            maxHeight: 600,
            width: _width,
            height: _heigth
        });
    }

})
