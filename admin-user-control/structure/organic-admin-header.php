<?php

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'register_header_settings' );

/**
 * Function to register the settings
 */
function register_header_settings()
{
    // Register the settings with Validation callback
    register_setting( 'organic_options', 'organic_header_options', 'pu_validate_settings' );
    register_setting('organic_options','organic_header_description', 'pu_validate_settings');
    register_setting('organic_options','organic_header_button_label', 'pu_validate_settings');
    register_setting('organic_options', 'organic_header_button_link');
    register_setting('organic_options', 'organic_header_background', 'wptuts_options_validate');
    

    // Add settings section
    //add_settings_section( 'organic_header', 'Organic header', 'display_header_section', 'organic_options.php' );

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

   
    //CHECK FUNCTIONS BELOW
    //add_settings_field( 'organic_header_title', 'Web site title', 'organic_display_header_title', 'organic_options.php', 'organic_header', $field_args ); //Register a settings field to a settings page and section. 
    //add_settings_field( 'organic_header_description', 'Web site description', 'organic_display_header_description', 'organic_options.php', 'organic_header', $field_args ); //Register a settings field to a settings page and section.  
    //add_settings_field( 'organic_header_button_label', 'Text to button', 'organic_display_header_button_label', 'organic_options.php', 'organic_header', $field_args );
    //add_settings_field('organic_header_button_link', 'Button link', 'organic_display_header_button_link', 'organic_options.php', 'organic_header', $field_args);
    //add_settings_field('organic_header_background', 'Background image', 'organic_display_header_background', 'organic_options.php', 'organic_header', $field_args);
}


/**
 * Function to add extra text to display on each section
 */
function display_header_section($section){ 

  
}


/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function organic_display_header_title($args)
{
    extract( $args );

    $option_name = 'organic_header_options';
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

function organic_display_header_description($args) 
{
	extract( $args );

    $option_name = 'organic_header_description';

    
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

function organic_display_header_button_label($args) 
{
    extract( $args );

    $option_name = 'organic_header_button_label';

    
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

function organic_display_header_button_link($args) 
{
    extract( $args );

      $option_name = 'organic_header_button_link';

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




function organic_display_header_background($args)
{
    extract( $args );

    $option_name = 'background-thumbnail-src';

    $options = get_option( $option_name );

    
    ?>
        
        <p class="hide-if-no-js">
          <a title="Set Footer Image" href="javascript:;" id="set-footer-thumbnail">
            Set background image
          </a>
        </p>

        <div id="featured-footer-image-container" class="hidden">
          <img src="<?php 
            if (!empty( $options ) )
            {
              echo $options;
            }
            else
            {
              echo $options; 
            }
            ?>" title="<?php echo get_option('background-thumbnail-title'); ?>"
            alt ="<?php echo get_option('background-thumbnail-alt');?>">

        </div>

      <p class="hide-if-no-js hidden">
        <a title="Remove Footer Image" href="javascript:;" id="remove-footer-thumbnail">
          Remove featured image
        </a>
      </p>

      <p id="featured-footer-image-info">
        <input type="hidden" id="footer-thumbnail-src" name="footer-thumbnail-src" value="<?php echo get_option('background-thumbnail-src'); ?>">
        <input type="hidden" id="footer-thumbnail-title" name="footer-thumbnail-title" value="<?php echo get_option('background-thumbnail-title'); ?>">
        <input type="hidden" id="footer-thumbnail-alt" name="footer-thumbnail-alt" value="<?php echo get_option('background-thumbnail-alt'); ?>">
      </p>
     <?php

}


function save_header_background()
{
    if (isset( $_REQUEST['footer-thumbnail-src'] ) )
    {
        update_option('background-thumbnail-src', sanitize_text_field( $_REQUEST['footer-thumbnail-src'] ) );
    }

    if (isset( $_REQUEST['footer-thumbnail-alt'] ) )
    {
        update_option('background-thumbnail-alt', sanitize_text_field( $_REQUEST['footer-thumbnail-alt'] ) );
    }

    if (isset( $_REQUEST['footer-thumbnail-title'] ) )
    {
        update_option('background-thumbnail-title', sanitize_text_field( $_REQUEST['footer-thumbnail-title'] ) );
    }
}


add_action('admin_init', 'save_header_background' );