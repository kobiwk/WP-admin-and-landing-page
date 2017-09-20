<?php

function register_section_six_settings()
{
	register_setting('organic_options', 'upload_and_text_six', 'validate_upload_and_text_six');

	//add_settings_section('organic_section_six','Section Six', 'display_section_six', 'organic_options.php');

	//add_settings_field('organic_section_six_upload', 'Upload image: ', 'organic_section_six_upload_image', 'organic_options.php', 'organic_section_six');
}

add_action('admin_init', 'register_section_six_settings');

function organic_section_six_upload_image()
{

	?>

	<p class="hide-if-no-js">
		<a title="Set image" href="javascript:;" id="set-section-six-image">
			Set background image 
		</a> 
	</p>

	<div id="featured-section-six-image-container" class="hidden">
		<img src="<?php echo get_option('section-six-thumbnail-src'); ?>" title="<?php echo get_option('section-six-thumbnail-src'); ?>"
            alt ="<?php echo get_option('section-six-thumbnail-alt'); ?>">
	</div>

	<p class="hide-if-no-js hidden">
		<a title="Remove section six image" href="javascript:;" id="remove-section-six-image">
			Remove featured image
		</a>
	</p>

	<p id="featured-section-six-image-info">
        <input type="hidden" id="section-six-thumbnail-src" name="section-six-thumbnail-src" value="<?php 
        	if (!empty(get_option('section-six-thumbnail-src') ) )
        	{
        		echo get_option('section-six-thumbnail-src'); 
        	}
        	?>">
        <input type="hidden" id="section-six-thumbnail-title" name="section-six-thumbnail-title" value="<?php 
        	if (!empty(get_option('section-six-thumbnail-title') ) )
        	{
        		echo get_option('section-six-thumbnail-title'); 
        	}
        	?>">
        <input type="hidden" id="section-six-thumbnail-alt" name="section-six-thumbnail-alt" value="
        <?php 
        	if (!empty(get_option('section-six-thumbnail-alt') ) )
        	{
        		echo get_option('section-six-thumbnail-alt'); 
        	}
        	?>">
      </p>
	<?php
}


function save_organic_section_six_image()
{
	if (isset($_REQUEST['section-six-thumbnail-src']) )
	{
		update_option('section-six-thumbnail-src', sanitize_text_field( $_REQUEST['section-six-thumbnail-src'] ));
	}

	if (isset($_REQUEST['section-six-thumbnail-title']) )
	{
		update_option('section-six-thumbnail-title', sanitize_text_field( $_REQUEST['section-six-thumbnail-title'] ));
	}

	if (isset($_REQUEST['section-six-thumbnail-alt']) )
	{
		update_option('section-six-thumbnail-alt', sanitize_text_field( $_REQUEST['section-six-thumbnail-alt'] ));
	}

	//finish other two atrributes
}


add_action('admin_init', 'save_organic_section_six_image');



function display_section_six()
{

}

function validate_upload_and_text_six()
{

}