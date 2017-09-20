<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package organic_food
 */
$options = get_option( 'organic_header_options' );
$options_desc = get_option('organic_header_description');
$options_butt_label = get_option('organic_header_button_label');
$options_header_butt_link = get_option('organic_header_button_link');
$options_bckg_image = get_option('background-thumbnail-src');
$options_header_logo = get_option('display_header_logo');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- Insert this within your head tag and after foundation.css -->
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'organic-food' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="header-background">
			<ul class="menu first-menu">
				<li><a href="#"><img src="<?php echo $options_header_logo; ?>"></a></li>
				<li><a href="#">Shop</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Featured</a></li>
			</ul>
			<ul class="menu align-right second-menu">
			    <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/img/search.png"></a></li>
			    <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/img/shop.png"></a></li>

			</ul>

			<div class="site-branding">
				<?php
				the_custom_logo();

				if ( is_front_page() || is_home() ) : //changed && to ||?> 
					<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo $options['pu_textbox']; ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $options['pu_textbox']; ?></a></p>

				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $options_desc['pu_textbox']; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
				<button class="hollow button" href="<?php echo $options_header_butt_link['pu_textbox']; ?>">
					<?php if (isset($options_butt_label['pu_textbox']) )
					{
						echo $options_butt_label['pu_textbox'];
					}
					else 
					{
						echo "Example";
					}
				 ?></button>
				
			</div><!-- .site-branding -->
			<img class="black-arrow" src="<?php echo get_template_directory_uri(); ?>/img/crna-strelica-dole.png" />
			<img class="background-image" src="<?php echo $options_bckg_image;?>" />

		</div> <!-- header background-->
	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
