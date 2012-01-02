		<!-- Slider -->
			<div id="slider" class="section-center">

				<div class="slider-content">
					<div class="text">
						<h1>Oh, hi!</h1>
						<p>We are a group of refreshingly personable developers geared toward designing clean and effective web sites.</p>
						<p>Get in touch with us: <a href="mailto:aloha@rounded.co" target="_blank">Email</a> | <a href="http://twitter.com/roundedco" target="_blank">Twitter</a></p>
					</div>
					<div class="image">
						<img src="images/fractal.png" alt="Yeah we are Rounded" />
					</div>
				</div>			
				
				<div class="slider-content">
					<div class="slider-text">
						<h1>Design</h1>
						<p>Company: broodr</p>
					</div>
					<img src="images/broodr.gif" alt="" />
				</div>	 
				
	</div>

		
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