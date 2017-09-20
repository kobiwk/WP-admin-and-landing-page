<?php

function register_basic_settings()
{
    // Register the settings with Validation callback
    register_setting( 'organic_options', 'organic_basic_options', 'pu_validate_settings' );
    
}



function organic_admin_display_basic() 
{
	?>
	<div>
	<h4>
	Do you want to Organic Food page as landing page? Choose below!
	</h4>
	  <select name="page-dropdown"> 
	    <option 
	    	<?php if ((get_option('page_on_front')) == 0 ) 
    		{
    			echo 'selected';
    		} ?> class="" name="" value=""><?php echo esc_attr( __( 'No landing page selected' ) ); ?></option>
	    <?php 
	      $pages = get_pages();
	      foreach ( $pages as $page )
	      {
	      	
	      	?>
	      	<option <?php 
	      	if ($page->ID == get_option('page_on_front') )
	      	{
	      		echo 'selected';
	      	}
	      	?> value ="<?php echo $page->ID; ?>">
	      		<?php echo $page->post_title ?> 
	      	</option>
	      	<?php
	        
	      }
	    ?>
	  </select>
	  <p> 
	  Currently selected page is:
	  	<?php echo get_the_title(get_option('page_on_front'))?> 
	  </p>
	</div>
	<?php
}

function organic_admin_display_header_logo($args)
{	
	extract($args);
	$option_name = 'display_header_logo_src';
	$options = get_option($option_name);

	?>
	<div class="logo-header">
	<h4>
		Choose logo for header section!
	</h4>

	
	<p class="hide-if-no-js">
    	<a title="Set Header Logo" href="javascript:;" id="set-header-logo">
	        Set header logo
      	</a>
    </p>

        <div id="featured-header-logo-container" class="hidden">
          <img src="<?php 
            if ( !empty( get_option('display_header_logo') ) ) 
            {
              echo get_option('display_header_logo');
            }?>" title="<?php 
            if (get_option('display_header_logo_title'))
            {
            	echo get_option('display_header_logo_title'); 
            }
            ?>"
            alt ="<?php 
            if (get_option('display_header_logo_alt'))
            {
            	echo get_option('display_header_logo_src_alt');
            }
			?>">
        </div>

      <p class="hide-if-no-js hidden">
        <a title="Remove Header Logo" href="javascript:;" id="remove-header-logo">
          Remove Header Logo
        </a>
      </p>

      <p id="featured-header-logo-info">
        <input type="hidden" id="header-logo-src" name="header-logo-src" value="<?php 
            if (!empty( get_option('display_header_logo') ) )
            {
              echo get_option('display_header_logo');
            }
           
            ?>">
        <input type="hidden" id="header-logo-title" name="header-logo-title" value="<?php 
            if (get_option('display_header_logo_title'))
            {
            	echo get_option('display_header_logo_title'); 
            }
            ?>">
        <input type="hidden" id="header-logo-alt" name="header-logo-alt" value="<?php 
            if (get_option('display_header_logo_alt'))
            {
            	echo get_option('display_header_logo_alt'); 
            }
            ?>">
      </p>
      </div>
	<?php

}


function organic_admin_display_footer_logo()
{
	?>
	<div>
		<p>
			Upload footer logo
		</p>
	</div>
	<?php	
}

function save_basic()
{
	if (isset($_REQUEST['page-dropdown']))
	{
		update_option('page_on_front', sanitize_text_field($_REQUEST['page-dropdown']));
	}

	if (isset($_REQUEST['header-logo-src']))
	{
		update_option('display_header_logo', sanitize_text_field($_REQUEST['header-logo-src']));
	}
}

add_action('admin_init', 'save_basic');

