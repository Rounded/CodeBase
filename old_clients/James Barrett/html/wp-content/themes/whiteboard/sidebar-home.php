<div id="home-slider">
	<div id="slide-1-c">
	
	</div>
	<div id="slide-2-c">
	
	</div>
	<div class="nav">
		<div class="slide-btn selected" id="slide-1">
		</div><!-- END navbar-btn -->
		<div class="slide-btn" id="slide-2">
		</div>
	</div><!-- #slide-nav -->

	<script src="jquery-1.4.4.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	// Define the entry point
	$(document).ready(function(){
	
	// ---------- Navbar ContentDisplay ----------
	
		// Set global variable selectedButton
		var selectedButton =  'slide-1';
		
		// Show first div when document is ready
		$('#slide-1-c').show();
		
		// Hover and highlight navbar buttons
		$("[class*='slide-btn']").hover(
			function() {
					$(this).addClass('hover');
			}, 
			function() {
					$(this).removeClass('hover');
		});
	
		// Show div relative to the navbar clicked
	    $("[class*='slide-btn']").click(function() {
	  		var whichContent = $(this).attr('id');
	  		
	  		$('#' + selectedButton + '').removeClass('selected');
	 		$('#' + whichContent + '-c').siblings().hide();
	  		$('#' + whichContent + '-c').show();
	  		$('#' + whichContent + '').addClass('selected');
	  		selectedButton = whichContent;
		});
		
	}); // End document.ready
		
	</script>

</div> <!-- END #home-slider -->