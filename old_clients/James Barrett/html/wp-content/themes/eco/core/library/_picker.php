<div class="picker">
	 <h4>Color Scheme Options</h4>
	<small>View this page in:</small>
	<ul>
		<li><a href="?colorscheme=blue">Blue</a> <?php if($_GET['colorscheme']=='blue' || !$_GET['colorscheme']) echo '<em>active</em>';?></li>
		<li><a href="?colorscheme=black">Black</a> <?php if($_GET['colorscheme']=='black') echo '<em>active</em>';?></li>
		<li><a href="?colorscheme=red">Red</a> <?php if($_GET['colorscheme']=='red') echo '<em>active</em>';?></li>
		<li><a href="?colorscheme=green">Green</a> <?php if($_GET['colorscheme']=='green') echo '<em>active</em>';?></li>
		<li><a href="?colorscheme=orange">Orange</a> <?php if($_GET['colorscheme']=='orange') echo '<em>active</em>';?></li>
	</ul>
	
	<h4>Drop Down Nav</h4>
	<ul>
		<li><a href="?dropdown=true">Enabled</a> <?php if(get_option('dropdown')=='true') echo '<em>active</em>';?></li>
		<li><a href="?dropdown=false">Disabled</a> <?php if(get_option('dropdown')=='false') echo '<em>active</em>';?></li>
	</ul>
</div>