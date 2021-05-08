  // Animation with slide and width button click and slide effect right to left

$(document).ready(function(){
    $('.button-box').click(function(){
    var hidden = $('.box-left');
    if (hidden.hasClass('visible')){
        hidden.animate({"left":"100%"}, "slow").removeClass('visible');
        
    }
    else {   hidden.animate({"left":"0"}, "slow").addClass('visible');

    } 
    })
    
    $('.button-close').click(function(){
    var hidden = $('.box-left');
    if (hidden.hasClass('visible')){
        hidden.animate({"left":"-100%"}, "slow").removeClass('visible');
        
    }
    else {   hidden.animate({"left":"0"}, "slow").addClass('visible');

    }
    });
})