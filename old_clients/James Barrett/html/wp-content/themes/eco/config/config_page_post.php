<?php

function get_edit_page_post_array(){
	
	return array(
			'the_sidebar' => array(
					'version' => 'pro',
					'type' => 'select',
					'selectvalues'=> array(
						'default'=> 'Default Sidebar',
						'secondary' => 'Secondary Sidebar',
						'short' => 'Short Sidebar'
					),
					'inputlabel' => 'Select Sidebar (optional)',
					'exp' => 'Select the widgetized sidebar you would like to show on this page. Only applies to page templates with sidebars. '
				),
			'colorscheme' => array(
					'version' => 'pro',
					'type' => 'select',
					'selectvalues'=> array(
						'green'=> 'Green',
						'black' => 'Black',
						'blue' => 'Blue',
						'orange' => 'Orange',
						'red' => 'Red',
					),
					'inputlabel' => 'Color Sheme on this page (optional)',
					'exp' => 'Pick a color scheme for this page (optional).'
				),
			'content_sidebar' => array(
					'version' => 'free',
					'type' => 'check',
					
					'inputlabel' => 'Show Content Sidebar',
					'exp' => 'Shows Content Sidebar on this page'
				),
			'full_width_widget' => array(
					'version' => 'pro',
					'type' => 'check',
					
					'inputlabel' => 'Show Full Width Sidebar area at bottom of page',
					'exp' => 'Shows Full Width Content Area on this page'
				),	
				
			'hide_bottom_sidebars' => array(
					'version' => 'pro',
					'type' => 'check',
					'inputlabel' => 'Hide widgetized columns on top of footer',
					'exp' => 'Hides the three widgetized areas that lie above the footer on this page.'
				),
			'hide_spotlight' => array(
					'version' => 'free',
					'type' => 'check',
					'where' => 'page',
					'inputlabel' => 'Hide colorized spotlight area that contains the page title',
					'exp' => 'Hides the colorized area on top of the theme that typically contains the page title.'
				),
			'featureboxes' => array(
					'version' => 'pro',
					'type' => 'check',
					'where' => 'page',
					'inputlabel' => 'Show feature boxes (from feature setup) on this page. ',
					'exp' => 'This shows the feature boxes from feature setup on top of this page template.'
				),
				
			'hide_ads' => array(
					'version' => 'pro',
					'type' => 'check',
					'inputlabel' => 'Hide Ads',
					'exp' => 'Hide ads (if activated) on this page'
				),
			'carousel_items' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'text',					
					'inputlabel' => 'Max Carousel Items (Carousel Page Template)',
					'exp' => 'The number of items/thumbnails to show in the carousel.'
				),
			'carousel_mode' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'select',	
					'selectvalues'=> array(
						'flickr'=> 'Flickr (default)',
						'posts' => 'Post Thumbnails',
						'ngen_gallery' => 'NextGen Gallery'
					),					
					'inputlabel' => 'Carousel Image/Link Mode (Carousel Page Template)',
					'exp' => 'Select the mode that the carousel should use for its thumbnails.<br/><br/>' .
							 '<strong>Flickr</strong> - (default) Uses thumbs from FlickrRSS plugin.<br/><strong> Post Thumbnails</strong> - Uses links and thumbnails from posts <br/>' .
							 '<strong>NextGen Gallery</strong> - Uses an image gallery from the NextGen Gallery Plugin'
				),
			'carousel_ngen_gallery' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'text',					
					'inputlabel' => 'NextGen Gallery ID For Carousel (Carousel Page Template / NextGen Mode)',
					'exp' => 'Enter the ID of the NextGen Image gallery for the carousel. <strong>The NextGen Gallery and carousel template must be selected.</strong>'
				),
			'featuretitle' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Title (Highlight Page Template)',
					'exp' => 'The title in the highlight section of the highlight page (preformatted inside an H1 tag).'
				),
			'featuretext' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Text (Highlight Page Template)',
					'exp' => 'The description text for your highlight page (use HTML to format).'
				),
			'featuremedia' => array(
					'version' => 'pro',
					'where' => 'page',
					'type' => 'textarea',					
					'inputlabel' => 'Highlight Media (Highlight Page Template)',
					'exp' => 'Highlight Page Media HTML or Embed Code.<br/> Media width: '.HMEDIAWIDTH
				)
		);

}


?>