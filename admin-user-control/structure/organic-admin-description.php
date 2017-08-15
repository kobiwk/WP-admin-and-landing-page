<?php

function register_section_three_settings()
{
	register_setting('organic_options', 'upload_and_text', 'validate_upload_and_text');

	//add_settings_section('organic_section_three','Section Three', 'display_section_three', 'organic_options.php');

	//add_settings_field('organic_section_three_upload', 'Upload image: ', 'organic_section_three_upload_image', 'organic_options.php', 'organic_section_three');
	//add_settings_field('organic_section_three_text', 'Upload text: ', 'organic_section_three_upload_text', 'organic_options.php', 'organic_section_three');
}

add_action('admin_init', 'register_section_three_settings');

function organic_section_three_upload_image()
{

	?>

	<p class="hide-if-no-js">
		<a title="Set image" href="javascript:;" id="set-section-three-image">
			Set background image 
		</a> 
	</p>

	<div id="featured-section-three-image-container" class="hidden">
		<img src="<?php echo get_option('section-three-thumbnail-src'); ?>" title="<?php echo get_option('section-three-thumbnail-src'); ?>"
            alt ="<?php echo get_option('section-three-thumbnail-alt'); ?>">
	</div>

	<p class="hide-if-no-js hidden">
		<a title="Remove section three image" href="javascript:;" id="remove-section-three-image">
			Remove featured image
		</a>
	</p>

	<p id="featured-section-three-image-info">
        <input type="hidden" id="section-three-thumbnail-src" name="section-three-thumbnail-src" value="<?php 
        	if (!empty(get_option('section-three-thumbnail-src') ) )
        	{
        		echo get_option('section-three-thumbnail-src'); 
        	}
        	?>">
        <input type="hidden" id="section-three-thumbnail-title" name="section-three-thumbnail-title" value="<?php 
        	if (!empty(get_option('section-three-thumbnail-title') ) )
        	{
        		echo get_option('section-three-thumbnail-title'); 
        	}
        	?>">
        <input type="hidden" id="section-three-thumbnail-alt" name="section-three-thumbnail-alt" value="
        <?php 
        	if (!empty(get_option('section-three-thumbnail-alt') ) )
        	{
        		echo get_option('section-three-thumbnail-alt'); 
        	}
        	?>">
      </p>
	<?php
}

function organic_section_three_upload_text()
{
	$content =  get_option('info-text') ;
	wp_editor($content,'editor_style', array('wpautop'=>false, 'media_buttons'=>false));
}


function save_organic_section_three_image()
{
	if (isset($_REQUEST['section-three-thumbnail-src']) )
	{
		update_option('section-three-thumbnail-src', sanitize_text_field( $_REQUEST['section-three-thumbnail-src'] ));
	}

	if (isset($_REQUEST['section-three-thumbnail-title']) )
	{
		update_option('section-three-thumbnail-title', sanitize_text_field( $_REQUEST['section-three-thumbnail-title'] ));
	}

	if (isset($_REQUEST['section-three-thumbnail-alt']) )
	{
		update_option('section-three-thumbnail-alt', sanitize_text_field( $_REQUEST['section-three-thumbnail-alt'] ));
	}

	if (isset($_REQUEST['editor_style']))
	{
		update_option('info-text', wp_kses_post(stripslashes($_REQUEST['editor_style']) ) );
	}

	//finish other two atrributes
}


add_action('admin_init', 'save_organic_section_three_image');



function display_section_three()
{

}

function validate_upload_and_text()
{

}