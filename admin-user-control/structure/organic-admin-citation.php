<?php

function register_section_five_settings()
{
	register_setting('organic_options', 'upload_and_text_five', 'validate_upload_and_text_five');

	//add_settings_section('organic_section_five','Section Five', 'display_section_five', 'organic_options.php');

	//add_settings_field('organic_section_five_upload', 'Upload image: ', 'organic_section_five_upload_image', 'organic_options.php', 'organic_section_five');
	//add_settings_field('organic_section_five_text', 'Upload text: ', 'organic_section_five_upload_text', 'organic_options.php', 'organic_section_five');
}

add_action('admin_init', 'register_section_five_settings');

function organic_section_five_upload_image()
{

	?>

	<p class="hide-if-no-js">
		<a title="Set image" href="javascript:;" id="set-section-five-image">
			Set background image 
		</a> 
	</p>

	<div id="featured-section-five-image-container" class="hidden">
		<img src="<?php echo get_option('section-five-thumbnail-src'); ?>" title="<?php echo get_option('section-five-thumbnail-src'); ?>"
            alt ="<?php echo get_option('section-five-thumbnail-alt'); ?>">
	</div>

	<p class="hide-if-no-js hidden">
		<a title="Remove section five image" href="javascript:;" id="remove-section-five-image">
			Remove featured image
		</a>
	</p>

	<p id="featured-section-five-image-info">
        <input type="hidden" id="section-five-thumbnail-src" name="section-five-thumbnail-src" value="<?php 
        	if (!empty(get_option('section-five-thumbnail-src') ) )
        	{
        		echo get_option('section-five-thumbnail-src'); 
        	}
        	?>">
        <input type="hidden" id="section-five-thumbnail-title" name="section-five-thumbnail-title" value="<?php 
        	if (!empty(get_option('section-five-thumbnail-title') ) )
        	{
        		echo get_option('section-five-thumbnail-title'); 
        	}
        	?>">
        <input type="hidden" id="section-five-thumbnail-alt" name="section-five-thumbnail-alt" value="
        <?php 
        	if (!empty(get_option('section-five-thumbnail-alt') ) )
        	{
        		echo get_option('section-five-thumbnail-alt'); 
        	}
        	?>">
      </p>
	<?php
}

function organic_section_five_upload_text()
{
	$content =  get_option('info-text-five') ;
	wp_editor($content,'editor_style_five', array('wpautop'=>false, 'media_buttons'=>false));
}


function save_organic_section_five_image()
{
	if (isset($_REQUEST['section-five-thumbnail-src']) )
	{
		update_option('section-five-thumbnail-src', sanitize_text_field( $_REQUEST['section-five-thumbnail-src'] ));
	}

	if (isset($_REQUEST['section-five-thumbnail-title']) )
	{
		update_option('section-five-thumbnail-title', sanitize_text_field( $_REQUEST['section-five-thumbnail-title'] ));
	}

	if (isset($_REQUEST['section-five-thumbnail-alt']) )
	{
		update_option('section-five-thumbnail-alt', sanitize_text_field( $_REQUEST['section-five-thumbnail-alt'] ));
	}

	if (isset($_REQUEST['editor_style']))
	{
		update_option('info-text-five', wp_kses_post(stripslashes($_REQUEST['editor_style_five']) ) );
	}

	//finish other two atrributes
}


add_action('admin_init', 'save_organic_section_five_image');



function display_section_five()
{

}

function validate_upload_and_text_five()
{

}