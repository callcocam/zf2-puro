$.Home = {};
var options=null;
$.Home.options = {
	mobile:{
		active:'active-mobile',
		btn:'.mobile-btn',
		open:'open',
		close:'close',
		nav:".main_nav",
		action:function(opt)
		{
			console.log(opt.open);
			if($(opt.btn).hasClass(opt.close))
			{
				$(opt.btn).removeClass(opt.close).addClass(opt.open);
				$(opt.nav).addClass(opt.active);
			}
			else
			{
				$(opt.btn).removeClass(opt.open).addClass(opt.close);
				$(opt.nav).removeClass(opt.active);
			}
		}
	}
}
$(function() {
	
	if($(".no-page").length)
	{
		$('.copy').addClass('footer-fixed');
	}
	else{
		if (typeof HomeOptions !== "undefined") {
		$.extend(true,
		$.Home.options,
		HomeOptions);
		}
		//Easy access to options
		options = $.Home.options;
		options.mobile.action(options.mobile);
		$(options.mobile.btn).click(function() {
			options.mobile.action(options.mobile);
		});

		$('.play').click(function() {
			console.log($(".first").children('.video').val());
		});
	}




})