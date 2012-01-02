// DROP DOWN BY PAGELINES

var $j = jQuery.noConflict();

$j(document).ready(function () {
	
	$j("ul.dropdown > li").hover(function(){
        $j(this).addClass("menuhover");
        $j('ul:first',this).fadeIn("fast");
    }, function(){	
        $j(this).removeClass("menuhover");
        $j('ul:first',this).fadeOut("fast");

    });

});