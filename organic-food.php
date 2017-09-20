<?php /* Template Name: organic-food */ ?>	
<?php
get_header(); ?>
<div class="row">
	<div class="all-you-need-container">
		<div class="all-you-need">
			<p>All you need is here: </p>
		</div>
		<div class="all-you-need-boxes">
			<?php 
			//insert wp query based on categories tooken from wp_options,
			//need first letter of category name and category name

			$options_for_cat_display = get_option('cat_for_display');
			if ($options_for_cat_display)
			{
				foreach ($options_for_cat_display as $option)
				{
					if (count($options_for_cat_display ) === 3)
					{
					?>
					<figure>
						<div class="box">
							<span><?php echo strtoupper(substr($option,0,1) );?></span>
						</div>
						<figcaption> <?php echo $option; ?> </figcaption>
					</figure>
					<?php
					}
					else{
						echo "<p>Nise uneli tri kategorije</p>";
					}
				}
			}
			else
			{
				echo "Import your data here!";
			}
			?>

			
		</div>
	</div> <!-- all-you-need-container-->
	

	
	<div id="primary" class="content-area">	
		
		<main id="main" class="site-main">
			<div class="slider-bckg">
				<h2> Featured products </h2>
				<div class="slider-container">
					<section class="center slider">
						<?php 
				    	$args = 'category_name=featured-posts&posts_per_page=4';
				    	$query = new WP_Query($args);
				    	$counter = 0;
	         		    if ($query->have_posts() ) :
						  while ($query->have_posts()) : $query->the_post();
						?>
							<div class="slick-slide-image">
	         		   	      <?php the_post_thumbnail(); ?>
	         		   	      <?php 
	         		   	      	//if post has custom value Best price
	         		   	      	if (!empty(get_post_custom_values('Best price', get_the_ID() )[0]))
	         		   	      	{
	         		   	      		?>
	         		   	      		<div class="organic-best-price">
	         		   	      			<div class="whole-best-price-tag">
		         		   	      			<img class="best-price-background" src="<?php echo get_template_directory_uri(); ?>/img/best-price.png">
		         		   	      			<span class="title-best-price">Best<br>price</span>
	         		   	      			</div>
	         		   	      		</div>
	         		   	      		<?php
	         		   	      	}
	         		   	      ?>
	         		   	      
	         		   	      <p class="fruit"><?php echo get_post_custom_values('Fruit', get_the_ID() )[0]; ?></p>
	         		   	      <p class="price"><?php echo get_post_custom_values('Price', get_the_ID() )[0]; ?></p>
	         		   	    </div>
				          <?php
			    			
			    		  endwhile;
			    	    endif;
			        ?>
						
					</section>
					<div id="shadow" class="shadow-left"></div>
				 	<div id="shadow" class="shadow-right"></div>
				</div><!-- slider-container -->
				<div class="actions-slider">
					<a href=""><img src="<?php bloginfo('template_url'); ?>/img/heart-like.png"></a>
					<a href=""><img src="<?php bloginfo('template_url'); ?>/img/shop-basket.png"></a>
				</div>

			</div>
				  

			
	
			<div class="organic-info">
				<img src="<?php echo get_option('section-three-thumbnail-src');?>">
				<div class="info-text">
					<div>
					<?php echo get_option('info-text') ?>
					</div>
				</div>
			</div>

			<div class="seasonal-fruits">
				<img src="<?php echo get_option('section-four-thumbnail-src');?>"
				alt="<?php echo get_option('section-four-thumbnail-alt');?>"
				title="<?php echo get_option('section-four-thumbnail-title');?>">
				<div class="seasonal-fruits-text">
					<h2><?php echo get_option('organic_section_four_options')['pu_textbox']; ?></h2>
					<p><?php echo get_option('organic_section_four_description')['pu_textbox']; ?></p>
					<button class="button" ><?php echo get_option('organic_section_four_button_label')['pu_textbox']; ?></button>
				</div>
			</div>

			<div class="testimonials">
				<img src="<?php echo get_option('section-five-thumbnail-src'); ?>">
				<div class="testimonials-text">
					<?php echo get_option('info-text-five'); ?>
				</div>
			</div>

			<div class="read-blog">
				<h2>Read from our blog</h2>
				<div class="read-blog-container">
					<?php
					$args = array('category_name'=>'Blog',
						'orderby'=>'date',
						'order'=>'DESC',
						'posts_per_page'=> '3');
					$query_blog = new WP_Query($args);
					if ( $query_blog -> have_posts() ) :

						if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>

						<?php
						endif;

						/* Start the Loop */
						while ( $query_blog -> have_posts() ) : $query_blog -> the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							//get_template_part( 'template-parts/content', get_post_format() );
							?>
							<div class="blog-tx">
								<span class="organic-blog-title">
									<a href="<?php echo esc_url(get_permalink() ); ?>">
										<?php echo title_excerpt_length(get_the_title() ); ?>
									</a>
								</span>
								<br>
								<span class="organic-blog-category">Category: </span>
								<br>
								<span class="organic-blog-date">21.3.2017</span>
								
								<div class="organic-blog-text">
									<?php the_excerpt();?>
								</div>
								<button class="button organic-button">Read more</button>
							</div>
							
							<?php
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div> <!-- read-blog-container -->
			</div>

			<div class="above-footer">
				<img src="<?php 
					if ('' != (get_option('section-six-thumbnail-src')))
					{
						echo get_option('section-six-thumbnail-src'); 
					}
					else
					{
						echo 'http://www.cvltnation.com/wp-content/uploads/2014/02/Bad-Brains-1979.jpg';
					}
					?>
					">
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #row -->

<?php

get_footer();
