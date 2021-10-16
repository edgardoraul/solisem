<?php
/**
 * Template Name: Home Solicem
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			
			
		<!-- El Slider -->
		<div class="slider slider__home animated fadeInUpBig">
			<div id="owl-dos" class="owl-carousel">
		<?php

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'Sliders' ),
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
		);

		// The Query
		$sliders_home = new WP_Query( $args );

		// The Loop
		if ( $sliders_home->have_posts() )
		{
			while ( $sliders_home->have_posts() )
			{
				$sliders_home->the_post();?>

				<div class="slider__item">
					<figure>
						<?php
						// Las anteriores
						$optional_size	= 'custom-thumb-600-250';
						$optional_size2	= 'custom-thumb-2400-1000';


						$img_id			= get_post_thumbnail_id( $post->ID );
						$image			= wp_get_attachment_image_src( $img_id, $optional_size );
						$image2			= wp_get_attachment_image_src( $img_id, $optional_size2 );
						$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
						$perm			= get_permalink ($post->ID );
						if ( $image )
						{
							if ( wpmd_is_notphone() )
							{
								echo '<img src="#" data-src="' . $image2[0] . '" class="lazyOwl" alt="' . $alt_text . '" />';
							}
							else
							{
								echo '<img src="#" data-src="' . $image[0] . '" class="lazyOwl" alt="' . $alt_text . '" />';
							}
						}
						;?>
					</figure>
					<div class="slider__home__leyenda gradient">
						<?php echo get_the_title();?>
					</div>
				</div>

			<?php	;}
			} else { ?>

				<div class="slider__item">
					<figure>
						<img class="lazyOwl" src="<?php bloginfo('stylesheet_directory');?>/img/slide-2.jpg" alt="imagen" />
					</figure>
					<div class="slider__home__leyenda gradient">
						Algo para decir
					</div>
				</div>
				<div class="slider__item">
					<figure>
						<img class="lazyOwl" src="<?php bloginfo('stylesheet_directory');?>/img/slide-3.jpg" alt="imagen" />
					</figure>
					<div class="slider__home__leyenda gradient">
						Algo para decir
					</div>
				</div>

		<?php	}

		// Restore original Post Data
		wp_reset_postdata();?>

			</div>
		</div>
<?php //};?>
		<!-- Fin del Slider -->

		<?php
			echo "<br />";
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// Carga de scripts jquery para el slider
wp_enqueue_script( 'script_jquery', get_stylesheet_directory_uri() . '/js/jquery-1.12.4.min.js', array ( 'jquery' ), '1.12.4', true);

// Carga de los scripts de slider y utilizades como el gotop y fancybox
wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.min.js', array ( 'jquery' ), '1.0', true);

do_action( 'storefront_sidebar' );
get_footer();
?>