// Animation with transition and width
 $(document).ready(function(){ 
  $(".img-responsive").hover(function(){
    $(this).addClass("big").removeClass("small");
  });
  $(".img-responsive").mouseleave(function(){
    $(this).removeClass("big").addClass("small");
  });
  });
 $(document).ready(function(){ 
  $(".div.img-responsive").hover(function(){
    $(this).addClass("big1").removeClass("small1");
  });
  $("div.img-responsive").mouseleave(function(){
    $(this).removeClass("big1").addClass("small1");
  });
  });