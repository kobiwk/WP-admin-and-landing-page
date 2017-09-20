<?php

/*tutorial from: https://code.tutsplus.com/articles/how-to-integrate-the-wordpress-media-uploader-in-theme-and-plugin-options--wp-26052*/


require_once('structure/organic-admin-basic.php');

require_once('structure/organic-admin-header.php');

require_once('structure/organic-admin-categories.php');

require_once('structure/organic-admin-description.php');

require_once('structure/organic-admin-find-local-food.php');

require_once('structure/organic-admin-citation.php');

require_once('structure/organic-admin-footer-image.php');


function organic_menu()
{
  $my_page = add_menu_page( 'Opcije Organic sajta', 'Organic', 'manage_options', 'organic_options.php', 'organic_theme_page');  

  add_action('load-'.$my_page, 'load_foundation_js');
  add_action('load-'.$my_page, 'load_foundation_style');
}

function load_foundation_js()
{
  add_action('admin_enqueue_scripts', 'enqueue_foundation_js');
}

function load_foundation_style()
{
  add_action('admin_enqueue_scripts', 'enqueue_foundation_style');
}

function enqueue_foundation_js()
{

  wp_enqueue_media(); // allow using of wp media uploader
  wp_enqueue_script( 'admin_foundation', get_template_directory_uri() . '/foundation6/js/vendor/foundation.js', array( 'jquery' ), '1', true );
  wp_enqueue_script('admin_foundation_init', get_template_directory_uri().'/foundation6/js/app.js', array('jquery'), '1', true );
}

function enqueue_foundation_style()
{
  wp_enqueue_style( 'ad_foundation', get_stylesheet_directory_uri() . '/foundation6/css/foundation.css' );
  wp_enqueue_style( 'admin_foundation_style', get_stylesheet_directory_uri() . '/foundation6/css/app.css' );
}
//add (sub)menu to admin page
add_action('admin_menu', 'organic_menu');


/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */ 
function organic_theme_page()
{
?>
    <div class="section panel">
      <h1>Organic Theme Options</h1>
      <ul class="tabs" data-tabs id="example-tabs">

        <li class="tabs-title is-active"><a href="#panel" aria-selected="true">Basic options</a></li>
        <li class="tabs-title"><a href="#panel1">Header</a></li>
        <li class="tabs-title"><a href="#panel2">Categories</a></li>
        <li class="tabs-title"><a href="#panelSlider">Slider</a></li>
        <li class="tabs-title"><a href="#panel3">Description</a></li>
        <li class="tabs-title"><a href="#panel4">Find local food</a></li>
        <li class="tabs-title"><a href="#panel5">Citation</a></li>
        <li class="tabs-title"><a href="#panelBlog">From blog</a></li>
        <li class="tabs-title"><a href="#panel6">Footer image</a></li>
        
      </ul>

      <?php settings_errors('wptuts-settings-errors'); ?>

      <?php 
        $args = array(
                    'type'      => 'text',
                    'id'        => 'pu_textbox',
                    'name'      => 'pu_textbox',
                    'desc'      => '',
                    'std'       => '',
                    'label_for' => 'pu_textbox',
                    'class'     => 'css_class'
                  );
      ?>
      <form id="form-wptuts-options" method="post" enctype="multipart/form-data" action="options.php">
          <div class="tabs-content" data-tabs-content="example-tabs">
              <div class="tabs-panel is-active" id="panel">
              <h2> Basic options </h2>
              <p> <?php organic_admin_display_basic(); ?>
                  <?php organic_admin_display_header_logo($args); ?>
              </p>
          </div>
              <div class="tabs-panel" id="panel1">
                <h2> Header section </h2>
                <p>Web site title:
                <?php organic_display_header_title($args);
                 ?>
                </p>

                <p> Web site desription: 
                  <?php organic_display_header_description($args);?>
                </p>
                <p> Text to button: 
                  <?php organic_display_header_button_label($args);?>
                </p>
                <p> Button link: 
                  <?php organic_display_header_button_link($args);?>
                </p>
                <p> Background image: 
                  <?php organic_display_header_background($args);?>
                </p>
                <p>
                  <?php save_header_background(); ?>
                </p>
              
            </div>

          
              <div class="tabs-panel" id="panel2">
                <h2> Categories </h2>
                <p> 
                  <?php organic_choose_category(); ?>
                  <?php save_section_one(); ?>
                </p>
              </div>
              <div class="tabs-panel" id="panel3">
                <h2> Description </h2>
                <p>
                  Choose image!
                  <?php organic_section_three_upload_image(); ?>
                </p>
               <p> Enter appropriate text: 
                  <?php organic_section_three_upload_text(); ?>
                </p>
                  <?php save_organic_section_three_image(); ?>
              </div>
              <div class="tabs-panel" id="panel4">
                <h2> Find local food </h2>
                <p> Enter title of section: 
                  <?php organic_display_section_four_title($args); ?>
                </p>
                <p> Enter description:
                  <?php organic_display_section_four_description($args); ?>
                </p>
                <p> Text to button:
                  <?php organic_display_section_four_button_label($args); ?>
                </p>
                <p> Button link:
                  <?php organic_display_section_four_button_link($args); ?>
                </p>
                <p> Background image:
                  <?php organic_display_section_four_background($args); ?>
                </p>
                  <?php save_section_four_background(); ?>
              </div>
              <div class="tabs-panel" id="panel5">
                <h2> Citation </h2>
                <p>
                  <?php organic_section_five_upload_image(); ?>
                </p>
                <p> Enter text: 
                  <?php organic_section_five_upload_text(); ?>
                </p>
                  <?php save_organic_section_five_image(); ?>
              </div>
              <div class="tabs-panel" id="panelBlog">
                  <h2> From blog </h2>
              </div>
              <div class="tabs-panel" id="panel6">
                  <h2> Footer Image </h2> 
                  <p>
                    <?php organic_section_six_upload_image(); ?> 
                  </p>            
                   <?php save_organic_section_six_image(); ?>
              </div>

              <?php
/**
 * Reading settings administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */


if ( ! current_user_can( 'manage_options' ) )
  wp_die( __( 'Sorry, you are not allowed to manage options for this site.' ) );

$title = __( 'Choose Landing Page' );
$parent_file = 'options-general.php';

get_current_screen()->add_help_tab( array(
  'id'      => 'overview',
  'title'   => __('Overview'),
  'content' => '<p>' . __('This screen contains the settings that affect the display of your content.') . '</p>' .
    '<p>' . sprintf(__('You can choose what&#8217;s displayed on the front page of your site. It can be posts in reverse chronological order (classic blog), or a fixed/static page. To set a static home page, you first need to create two <a href="%s">Pages</a>. One will become the front page, and the other will be where your posts are displayed.'), 'post-new.php?post_type=page') . '</p>' .
    '<p>' . __('You can also control the display of your content in RSS feeds, including the maximum number of posts to display and whether to show full text or a summary.') . '</p>' .
    '<p>' . __('You must click the Save Changes button at the bottom of the screen for new settings to take effect.') . '</p>',
) );

get_current_screen()->add_help_tab( array(
  'id'      => 'site-visibility',
  'title'   => has_action( 'blog_privacy_selector' ) ? __( 'Site Visibility' ) : __( 'Search Engine Visibility' ),
  'content' => '<p>' . __( 'You can choose whether or not your site will be crawled by robots, ping services, and spiders. If you want those services to ignore your site, click the checkbox next to &#8220;Discourage search engines from indexing this site&#8221; and click the Save Changes button at the bottom of the screen. Note that your privacy is not complete; your site is still visible on the web.' ) . '</p>' .
    '<p>' . __( 'When this setting is in effect, a reminder is shown in the At a Glance box of the Dashboard that says, &#8220;Search Engines Discouraged,&#8221; to remind you that your site is not being crawled.' ) . '</p>',
) );

get_current_screen()->set_help_sidebar(
  '<p><strong>' . __('For more information:') . '</strong></p>' .
  '<p>' . __('<a href="https://codex.wordpress.org/Settings_Reading_Screen">Documentation on Reading Settings</a>') . '</p>' .
  '<p>' . __('<a href="https://wordpress.org/support/">Support Forums</a>') . '</p>'
);


?>

<?php //put code below in separate file, separate function and
// add saving function to make it work  ?>


            </div><?php 
                settings_fields('organic_options'); //display the hidden fields and handle security of options form
              
                do_settings_sections('organic_options.php'); // to display the sections assigned to the page and settings contained witin
              ?>
                  <p class="submit">  
                      <input name="theme_wptuts_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                      <input name="theme_wptuts_options[reset]" type="submit" class="button-secundary" value="<?php esc_attr_e('Reset Defaults', 'wptuts'); ?>" >
                 </p>  
               
            </form> 

          </div>

    <?php
}


/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function pu_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number

    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }
  return $newinput;
}

//register javascript
function options_enqueue_scripts()
{
  wp_register_script('wptuts_upload', get_template_directory_uri().'/admin-user-control/js/wptuts-upload.js', array('jquery', 'media-upload', 'thickbox') );

  wp_enqueue_script('my_script', get_template_directory_uri().'/admin-user-control/js/my_script.js', array('jquery', 'media-upload', 'thickbox') );
  if ('appearance_page_wptuts-settings' === get_current_screen() -> id)
  {
      wp_enqueue_media();
      wp_enqueue_script('jquery');

      wp_enqueue_script('thickbox');
      wp_enqueue_style('thickbox');

      wp_enqueue_script('media-upload');
      wp_enqueue_script('wptuts-upload');    
  }

  
  
 
}

add_action('admin_enqueue_scripts', 'options_enqueue_scripts');



