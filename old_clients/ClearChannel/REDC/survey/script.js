$(function(){

  var question = $("form > .question");

setTimeout(function(){
  question.each(function(e){
    var questionHeight = $(this).height();
    $(this).find(".number-box").css({
      'height':questionHeight+"px",
      'line-height':questionHeight+"px"
    });
  });
},100)
  

  $('.button').live('click',function(e){

    var that = $(this);
    var numberBox = that.closest('.question').find('.number-box')
    numberBox.css('background','#A3C828 url(assets/gloss400.png) 50% 50% repeat-x');
    that.css('opacity',1).siblings('.button').css('opacity',.5);
    that.closest('.hidden').val()

    var top = numberBox.offset().top;
      top += numberBox.height();

    $('html,body').animate({
      scrollTop:top
    },900);
  });


   $( ".radio" ).buttonset();
});