<aside>
	<!-- Home Slider -->
	<div id="hslider" >
		<div id="slider">
			<div class="slider-content">									
				<img src="images/angel.jpg" alt="angel" />
			</div>
			
			<div class="slider-content">									
				<img src="images/jgirl.jpg" alt="angel" />
			</div>				
		</div><!-- END slider --> 			
	</div><!-- End hslider -->
	
	<script type="text/javascript">
		$(document).ready(function () {
			
		
			$('#slider').orbit({
		  		animation:'horizontal-push',
		  		animationSpeed:500
		  	});
		  	
		  	 	$('.orbit-wrapper').hover(function(){
		  		$('.slider-nav').show();
		  	});
		  	
		  	$('.orbit-wrapper').mouseleave(function(){
		  		$('.slider-nav').hide();
		  	});

		
		});
	</script>
		
</aside>