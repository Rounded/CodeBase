<?php

function get_feature_array(){
	
	
	return array(
		'feature_settings' => array(
					'timeout' => array(
							'default' => 0,
							'type' => 'text_small',
							'inputlabel' => 'Timeout (ms)',
							'title' => 'Feature Viewing Time (Timeout)',
							'shortexp' => 'The amount of time a feature is set before it transitions in milliseconds',
							'exp' => 'Set this to 0 to only transition on manual navigation. Use milliseconds, for example 10000 equals 10 seconds of timeout.'
						),
					'fspeed' => array(
							'default' => 1500,
							'type' => 'text_small',
							'inputlabel' => 'Transition Speed (ms)',
							'title' => 'Feature Transition Time (Timeout)',
							'shortexp' => 'The time it takes for your features to transition in milliseconds',
							'exp' => 'Use milliseconds, for example 1500 equals 1.5 seconds of transition time.'
						),
					'feffect' => array(
							'default' => 'fade',
							'type' => 'select_same',
							'selectvalues' => array('blindX','blindY','blindZ', 'cover','curtainX','curtainY','fade','fadeZoom','growX','growY','none','scrollUp','scrollDown','scrollLeft','scrollRight','scrollHorz','scrollVert','shuffle','slideX','slideY','toss','turnUp','turnDown','turnLeft','turnRight','uncover','wipe','zoom'),
							'inputlabel' => 'Select Transition Effect',
							'title' => 'Transition Effect',
							'shortexp' => "How the features transition",
							'exp' => "This controls the mode with which the features transition to one another."
						),
					'feature_playpause' => array(
							'default' => false,
							'type' => 'check',
							'inputlabel' => 'Show play pause button?',
							'title' => 'Show Play/Pause Button (when timeout is greater than 0 (auto-transition))',
							'shortexp' => "Show a play/pause button for auto-scrolling features",
							'exp' => "Selecting this option will add a play/pause button for auto-scrolling features, that users can use to pause and watch a video, read a feature, etc.."
						),
					'feature_name_nav' => array(
							'default' => false,
							'type' => 'check',
							'inputlabel' => 'Use names for feature navigation?',
							'title' => 'Use feature names for navigation',
							'shortexp' => "Substitutes the feature names for the numbers for the feature slides",
							'exp' => "This option will substitute the feature names for the numbers in the feature navigation."
						),
					'fremovesync' => array(
							'default' => false,
							'type' => 'check',
							'inputlabel' => 'Remove Transition Syncing',
							'title' => 'Remove Feature Transition Syncing',
							'shortexp' => "Make features wait to move on until after the previous one has cleared the screen",
							'exp' => "This controls whether features can move on to the screen while another is transitioning off. If removed features will have to leave the screen before the next can transition on to it."
						)
						
		)
	); 
		
}

function get_feature_setup(){
	return array(	
			'title' => array(
						'title' => 'Feature Title',
						'shortexp'=> 'Styling the "title" section of the feature',
						'exp' => 'This is where to type the title text or other HTML that you would like to accompany the media in the feature.<br/> <strong>We recommend H1 tags with a class of "ftitle" and H3 tags with a class of "fsub"</strong>',
						'inputlabel' => 'Feature Title (text + html)',
						'type' => 'textarea'
				),
			'text' => array(
						'title' => 'Feature Text',
						'shortexp'=> 'Use text with html to style your description',
						'exp' => 'This is where to type the describing text or other HTML that you would like to accompany the media in the feature. HTML, links & images are all possible.<br/> <strong>Make sure to use paragraph tags for formatting ("&lt;p&gt;" tags).</strong>',
						'inputlabel' => 'Feature Text (text + html)',
						'type' => 'textarea_big'
				),
			'media' => array(
						'title' => 'Feature Media',
						'shortexp'=> 'Add pictures, videos, text or anything you can embed to the feature (HTML)',
						'exp' => "Add media like pictures or youtube videos here. HTML is ok, or use 'embed' code from any website.<br/> Make it any size you like but it's optimized for a width of <strong>".FMEDIAWIDTH."</strong> and height of <strong>".FMEDIAHEIGHT."</strong>.<br/><br/> Add a 'br' tag on top to create a separation between the top of the feature and the media.",
						'inputlabel' => 'Feature Media Code (Embed Code or HTML)',
						'type' => 'textarea_big'
				),
			'link' => array(
						'title' => 'Feature Link (Optional)',
						'shortexp'=> 'Add a URL for the feature to tell users where to "learn more"',
						'exp' => 'This link will show up under the featuretext. Use full URL.',
						'inputlabel' => 'Feature Link (URL)',
						'type' => 'text'
				),
			'background' => array(
						'title' => 'Feature Background (CSS - Optional)',
						'shortexp'=> 'Use CSS shorthand to control the feature background',
						'exp' => 'Use <a href="http://www.w3schools.com/css/css_background.asp">CSS background shorthand</a> to style the background of each feature. For example: <strong>#fff url(image.gif) no-repeat top left</strong>.',
						'inputlabel' => 'Feature Background (CSS Background Shorthand)',
						'type' => 'text'
				),
			'page' => array(
						'title' => "Display Pages (optional)",
						'shortexp' => "Which pages should show this feature slide",
						'exp' => "Add the IDs of the pages that you want to display this feature slide. <br/><strong>Note:</strong> if no page is added, it will show on all feature pages.  Also a page template that includes the features slides must be selected for this to work.",
						'inputlabel' => 'Page IDs - Comma Separated',
						'type' => 'text'
				),
			'name' => array(
						'title' => 'Feature Name (optional)',
						'shortexp'=> 'For easy referencing in the menu',
						'exp' => 'This just allows you to change the name of the feature in the menu navigation. It may be used for more features in the future.',
						'inputlabel' => 'Feature Name',
						'type' => 'text'
				),
			'draft' => array(
						'title' => "Draft Status (optional)",
						'shortexp' => "Select if still drafting",
						'exp' => "Select this option if you want this feature to be a draft and not be published to your site",
						'inputlabel' => 'Mark As Draft',
						'type' => 'check'
				),
		);
	
}



function get_default_features(){
	return array(
			'1' => array(
		        	'title' => '<h1 class="ftitle">10% Donated</h1><h3 class="fsub">to the environment</h3>',
		        	'text' => '<p>Buy '.THEMENAME.' and we will donate 10% to help save the environment.</p>',
		        	'media' => '<img src="'.THEME_IMAGES.'/feature1.png" alt="feature1" />',
		        	'link' => '#',
					'background' => '',
					'name'=>'Feature 1',
		    ),
			'2' => array(
		        	'title' => '<h3 class="fsub">Make An</h3><h1 class="ftitle">Impression</h1>',
		        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis molestie nunc. Vivamus.</p>',
		        	'media' => '<div class="box_shadow fix"><object width="'.FMEDIAWIDTH.'" height="'.FMEDIAHEIGHT.'"><param name="movie" value="http://www.youtube.com/v/8jP8CC2rKj4&hl=en_US&fs=1&start=32&showinfo=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param value="transparent" name="wmode" /><embed src="http://www.youtube.com/v/8jP8CC2rKj4&hl=en_US&fs=1&start=32&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"   width="'.FMEDIAWIDTH.'" height="'.FMEDIAHEIGHT.'"></embed></object></div>',
		        	'link' => '#',
					'background' => '',
					'name'=>'Feature 2'
		    ),
			'3' => array(
				 	'title' => '<h3 class="fsub">Wordpress Theme By</h3><h1 class="ftitle">PageLines</h1>',
		        	'text' => '<p>Welcome to a professional WordPress theme by PageLines. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
		        	'media' => '<img src="'.THEME_IMAGES.'/feature3.png" />',
		        	'link' => '',
					'background' => '',
					'name'=>'Feature 3'
		    ),
			'4' => array(
		        	'title' => '',
		        	'text' => '',
		        	'media' => '',
		        	'link' => '',
					'background' => '',
					'name'=>'Feature 4'
		    ),
			'5' => array(
		        	'title' => '',
		        	'text' => '',
		        	'media' => '',
		        	'link' => '',
					'background' => '',
					'name'=>'Feature 5'
		    ),
			'6' => array(
		        	'title' => '',
		        	'text' => '',
		        	'media' => '',
		        	'link' => '',
					'background' => '',
					'name'=>'Feature 6'
		    )
	);
}

function get_fbox_setup(){
	return array(	
			'title' => array(
						'title' => 'Feature Box Title',
						'shortexp'=> 'Styling the "title" section of the feature box',
						'exp' => 'Type the feature box title text with HTML formatting.<br/><br/> We recommend H3 tags for example:<br/> <strong>&lt;h3&gt;Your Feature Box Title &lt;/h3&gt;</strong>',
						'inputlabel' => 'Feature Title (text + html)',
						'type' => 'textarea'
				),
    		'text' => array(
						'title' => "Feature Box Text + HTML",
						'shortexp' => "The text inside of your footer text boxes",
						'exp' => "Set the text for your feature boxes. Use HTML markup including image tags for pictures.<br/><br/>For example:<br/> <strong>&lt;img src='image_url.com' alt='alt text' /&gt;</strong>",
						'inputlabel' => 'Feature box text and html',
						'type' => 'textarea_big'
				),
			'icon' => array(
						'title' => "Feature Box Icon (optional)",
						'shortexp' => "Add an icon to your feature box",
						'exp' => "Simply add the full url to an icon that is ".FBOXMEDIAWIDTH." wide by ".FBOXMEDIAHEIGHT." high.",
						'inputlabel' => 'Icon URL',
						'type' => 'text'
				),
			'name' => array(
						'title' => "Name (optional)",
						'shortexp' => "The name of this feature box for reference",
						'exp' => "Simply add a name for this box so you can navigate to it quickly.",
						'inputlabel' => 'Name',
						'type' => 'text'
				),
			'page' => array(
						'title' => "Display Page IDs (optional)",
						'shortexp' => "Which pages should show this feature box (if none are set, it will be shown on all pages with fboxes enabled)",
						'exp' => "Add the IDs of the pages that you want to display this feature box. <br/><strong>Note:</strong> if no page is added, it will show on all pages.  Also a page template that includes the features boxes must be selected for this to work.",
						'inputlabel' => 'Page IDs - Comma Separated',
						'type' => 'text'
				)
		);
}

function get_default_fboxes(){
	return array(
		'1' => array(
	        	'title' => '<h3>You\'ll love this theme</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>', 
				'icon' => THEME_IMAGES.'/fbox1.png',
				'name' => 'Feature Box 1',
				'page' => ''
	    ),
		'2' => array(
	        	'title' => '<h3>PageLines Themes</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>',
				'icon' => THEME_IMAGES.'/fbox2.png',
				'name' => 'Feature Box 2',
				'page' => ''
	    ),
		'3' => array(
	        	'title' => '<h3>Thanks!</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>',
				'icon' => THEME_IMAGES.'/fbox3.png',
				'name' => 'Feature Box 3',
				'page' => ''
	    )
	);
}



?>