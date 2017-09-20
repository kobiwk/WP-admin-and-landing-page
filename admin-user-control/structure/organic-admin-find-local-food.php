<?php

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'register_section_four_settings' );

/**
 * Function to register the settings
 */
function register_section_four_settings()
{
    // Register the settings with Validation callback
    register_setting( 'organic_options', 'organic_section_four_options');
    register_setting('organic_options','organic_section_four_description');
    register_setting('organic_options','organic_section_four_button_label');
    register_setting('organic_options', 'organic_section_four_button_link');
    register_setting('organic_options', 'organic_section_four_background');
    

    // Add settings section
    //add_settings_section( 'organic_section_four', 'Organic Section Four', 'display_section_four_section', 'organic_options.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'pu_textbox',
      'name'      => 'pu_textbox',
      'desc'      => 'Web site title',
      'std'       => '',
      'label_for' => 'pu_textbox',
      'class'     => 'css_class'
    );

   

    //add_settings_field( 'organic_section_four_title', 'Title', 'organic_display_section_four_title', 'organic_options.php', 'organic_section_four', $field_args ); //Register a settings field to a settings page and section. 
    //add_settings_field( 'organic_section_four_description', 'Description', 'organic_display_section_four_description', 'organic_options.php', 'organic_section_four', $field_args ); //Register a settings field to a settings page and section.  
    //add_settings_field( 'organic_section_four_button_label', 'Text to button', 'organic_display_section_four_button_label', 'organic_options.php', 'organic_section_four', $field_args );
    //add_settings_field('organic_section_four_button_link', 'Button link', 'organic_display_section_four_button_link', 'organic_options.php', 'organic_section_four', $field_args);
    //add_settings_field('organic_section_four_background', 'Background image', 'organic_display_section_four_background', 'organic_options.php', 'organic_section_four', $field_args);
}


/**
 * Function to add extra text to display on each section
 */
function display_section_four_section($section){ 

}


/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function organic_display_section_four_title($args)
{
    extract( $args );

    $option_name = 'organic_section_four_options';


    $options = get_option( $option_name );
	

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

function organic_display_section_four_description($args) 
{
	extract( $args );

    $option_name = 'organic_section_four_description';

    
	$options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }

}

function organic_display_section_four_button_label($args) 
{
    extract( $args );

    $option_name = 'organic_section_four_button_label';

    
    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

function organic_display_section_four_button_link($args) 
{
    extract( $args );

      $option_name = 'organic_section_four_button_link';

      $options = get_option( $option_name );

       switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}




function organic_display_section_four_background($args)
{
    extract( $args );

    $option_name = 'section-four-thumbnail-src';

    $options = get_option( $option_name );

    
    ?>
        
        <p class="hide-if-no-js">
          <a title="Set Footer Image" href="javascript:;" id="set-section-four-thumbnail">
            Set background image
          </a>
        </p>

        <div id="featured-section-four-image-container" class="hidden">
          <img src="<?php 
            if (!empty( $options ) )
            {
              echo $options;
            }
            else
            {
              echo $options; 
            }
            ?>" title="<?php echo get_option('section-four-thumbnail-title'); ?>"
            alt ="<?php echo get_option('section-four-thumbnail-alt');?>">

        </div>

      <p class="hide-if-no-js hidden">
        <a title="Remove Footer Image" href="javascript:;" id="remove-section-four-thumbnail">
          Remove featured image
        </a>
      </p>

      <p id="featured-section-four-image-info">
        <input type="hidden" id="section-four-thumbnail-src" name="section-four-thumbnail-src" value="<?php echo get_option('section-four-thumbnail-src'); ?>">
        <input type="hidden" id="section-four-thumbnail-title" name="section-four-thumbnail-title" value="<?php echo get_option('section-four-thumbnail-title'); ?>">
        <input type="hidden" id="section-four-thumbnail-alt" name="section-four-thumbnail-alt" value="<?php echo get_option('section-four-thumbnail-alt'); ?>">
      </p>
     <?php

}


function save_section_four_background()
{
    if (isset( $_REQUEST['section-four-thumbnail-src'] ) )
    {
        update_option('section-four-thumbnail-src', sanitize_text_field( $_REQUEST['section-four-thumbnail-src'] ) );
    }

    if (isset( $_REQUEST['section-four-thumbnail-alt'] ) )
    {
        update_option('section-four-thumbnail-alt', sanitize_text_field( $_REQUEST['section-four-thumbnail-alt'] ) );
    }

    if (isset( $_REQUEST['section-four-thumbnail-title'] ) )
    {
        update_option('section-four-thumbnail-title', sanitize_text_field( $_REQUEST['section-four-thumbnail-title'] ) );
    }
}


add_action('admin_init', 'save_section_four_background' );