$(function() {
  //  Au focus
  $('.form-control').focus(function(){
    $(this).parent().addClass('is-focused has-label');
  });

  // à la perte du focus
  $('.form-control').blur(function(){
    $parent = $(this).parent();
    if($(this).val() == ''){
      $parent.removeClass('has-label');
    }
    $parent.removeClass('is-focused');
  });

  // si un champs est rempli on rajoute directement la class has-label
  $('.form-control').each(function(){
    if($(this).val() != ''){
      $(this).parent().addClass('has-label');
    }
  });

})