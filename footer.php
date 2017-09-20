<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package organic_food
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="footer-foundation">
			<div class="first-footer-column">
				<img src="<?php echo get_template_directory_uri();?>/img/icon.png">
			</div>
			<div class="second-footer-column">
				<div class="footer-column">
					<span class="footer-title">ABOUT US</span> <br>

					Fake adress 3122; <br>
					CITY<br>
					STATE<br>
					<br>
					CALL US:<br>
					+(122)333-555-3212<br>
					<br>
					WRITE TO US:<br>
					fake@organic.com<br>
				</div>
				<div class="footer-column">
					<span class="footer-title">SHOP</span><br>
					MEAT<br>
<br>
					VEGETABLES<br>
<br>
					FRUIT<br>


					
				</div>
				<div class="footer-column">
					<span class="footer-title">SUPPORT</span><br>

					Contact us<br>
					<br>
					FAQ<br>
					<br>
					Privacy<br>
					<br>
					Blog<br>
				</div>
				<div class="footer-column">
					<span class="footer-title">NEWSLETTER</span> <br>

					Subscribe to our<br> 
					newsletter<br>
					<form action="" method="post">
						<input type="email" name="email" value="YOUR E-MAIL ADDRESS" size="60">
						<button type="submit" class="button">Submit</button>
					</form>
					
				</div>
			</div>
		</div>
		<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'organic-food' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'organic-food' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'organic-food' ), 'organic-food', '<a href="https://automattic.com/">Underscores.me</a>' );
				?>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
	 <?php 
	$args = 'category_name=featured-posts&posts_per_page=3';
	$query = new WP_Query($args);
	?>
	
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
