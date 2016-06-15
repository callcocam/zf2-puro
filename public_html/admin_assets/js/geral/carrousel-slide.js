var count=0;
var ident=0;
var slide;
var nunImages=1; 
var MarginPadding=0;
$(function () {
  
 
  MarginPadding=parseInt($('.carrossel .item').css('padding-right'));
   var width=(parseInt($('.carrossel').outerWidth())+parseInt(MarginPadding)) * parseInt($('.carrossel .item').length);
  $('.carrossel').width(width);
 

medidas(parseInt($(window).outerWidth())); 
$(window).on('resize', function() {
  medidas(parseInt($(window).outerWidth())); 
});
  
   $('.forth').click(function() {automatizar(null);});
   $('.back').click(function() { automatizar(1);});
     
     var action=setInterval(slideGo,10000);
     $('.slide_nav.go').click(function() {
       clearInterval(action);
       slideGo();
     });

      $('.slide_nav.back').click(function() {
       clearInterval(action);
       slideBack();
     });
   //Shadowbox.init();

	})

function slideGo() {
     if($('.slide-item.first').next().size())
     {
      $('.slide-item.first').fadeOut('400', function() {
        $(this).removeClass('first').next().fadeIn('400').addClass('first');
      });
     }
     else
     {
      $('.slide-item.first').fadeOut('400', function() {
        $('.slide-item').removeClass('first');
        $('.slide-item:eq(0)').fadeIn('400').addClass('first');
      });
     }
     }
function slideBack() {
  if($('.slide-item.first').index()>=$('.slide-item').length)
     {
      $('.slide-item.first').fadeOut('400', function() {
        $(this).removeClass('first').prev().fadeIn('400').addClass('first');
      });
     }
     else
     {
      $('.slide-item.first').fadeOut('400', function() {
        $('.slide-item').removeClass('first');
        $('.slide-item:last-of-type').fadeIn('400').addClass('first');
      });
     }
}


function medidas(box_carrossel) {
  if(box_carrossel<=350){
       var l=box_carrossel/1;
      $('.carrossel .item').css('width',l+"px");   
      nunImages=1;
    }
  else if(box_carrossel<540)
  {
       var l=box_carrossel/2;
       $('.carrossel .item').css('width',l+"px");  
       nunImages=2;
    
    }
  else if(box_carrossel <=816)
  {
       var l=box_carrossel/3;
       $('.carrossel .item').css('width',l+"px");
       nunImages=3;  
       
  }
   else if(box_carrossel <=1080)
  {
       var l=box_carrossel/4;
       $('.carrossel .item').css('width',l+"px");  
       nunImages=4;
    }
  else if(box_carrossel <=1360)
  {
       var l=box_carrossel/5;
       $('.carrossel .item').css('width',l+"px"); 
       nunImages=5; 
   }
   else if(box_carrossel <=1450)
  {
       var l=box_carrossel/6;
       $('.carrossel .item').css('width',l+"px");  
       nunImages=6;
        }
  else
  {
  var l=box_carrossel/7;
  $('.carrossel .item').css('width',l+"px");
  nunImages=7;
  }
  $('.carrossel').css('left',"-"+l+"px");
  $('.carrossel').css('margin-left',"0px");
  ident=0;
  
}

function automatizar(back) {
    count=($('.carrossel .item').length / nunImages) - 1;
    slide=(nunImages * MarginPadding) + ($('.carrossel img').outerWidth() * nunImages);
    if(ident < count && back === null) {
    ident++;
   $('.carrossel').animate({'margin-left': '-=' + slide + 'px'}, 500);
   } else {
   if (ident >= 1 && back != null) {
   ident--;
   $('.carrossel').animate({'margin-left': '+=' + slide + 'px'}, 500);
   }
  } 
  
}
 