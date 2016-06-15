class App extends SIGAMessages{
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

    if (_App.seletorElements.length) {
        _App.escondeElements();
    }

    $(_App.seletorElements).on('change', function (event) {
        event.preventDefault();
        options.escondeElements();
    });

    $("#created, #publish_down").datetimepicker({
        timepicker: false,
        format: 'd-m-Y',
        onChangeDateTime: function (dp, $input) {
            //alert($input.val());
        }
    });
    $.datetimepicker.setLocale('pt-BR');
    $(_App.carregando).hide();
    $(_App.boxCarregando).hide();

})
