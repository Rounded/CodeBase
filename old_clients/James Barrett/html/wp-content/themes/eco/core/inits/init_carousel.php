<script type="text/javascript" src="<?php echo CORE_JS.'/carousel.jcarousellite.js';?>"></script>
<script type="text/javascript" src="<?php echo CORE_JS.'/carousel.mousewheel.js';?>"></script>
<link rel="stylesheet" href="<?php echo PRO_CSS.'/carousel.css';?>" type="text/css" media="screen" />
<script type="text/javascript">
/* <![CDATA[ */
var $j = jQuery.noConflict();

$j(document).ready(function () {
    $j(".thecarousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev", 
		visible: 9, 
		circular: true, 
		scroll: 6,
		speed: 600,
		mouseWheel: true
	});
});
/* ]]> */
</script>