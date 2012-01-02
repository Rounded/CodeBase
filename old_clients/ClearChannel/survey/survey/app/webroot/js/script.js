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
  

$('#question3 .button').live('click',function(e){
  var that = $(this),
  whichNum = that.attr('id').substring(that.attr('id').length-1);
  
  $("#question4-"+whichNum+"").show().siblings(":not(.custom,.text-input)").hide();

  var questionHeight = $("#number4").parent().height();

  $("#number4").css({
    'height':questionHeight+"px",
    'line-height':questionHeight+"px"
  });

  $('.hide-question').fadeOut(300);
});

$('.text-input-2').live('keyup',function(e){
  var whichField = $(this);
  var whichNum = $(this).val()

  $(this).siblings().each(function(){
    if($(this).val() == whichNum){
      $(this).val('')
    }
  })

    // $('[value='+whichNum+']')).val('')

  $('.text-input-2').each(function(){
    $(this).val($(this).val().replace(/[^1-3\.]/g,'')) ;
  })

      
  

});

});