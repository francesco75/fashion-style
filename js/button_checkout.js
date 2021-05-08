$(document).ready(function(){
  $('button').hover(function() {
  $(this).removeClass(' btn btn-success').addClass('new_button');
  });
  $('button').mouseleave(function() {
  $(this).removeClass(' new_button').addClass('btn btn-success');
});    
  });