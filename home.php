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


	<div class="losCarteles">
<?php
	// Comienzo de los carteles de los sistemas
	$sistema_1				= of_get_option( 'sistema_1', '' );
	$sistema_titulo_1		= of_get_option( 'sistema_titulo_1', '' );
	$sistema_contenido_1	= of_get_option( 'sistema_contenido_1', '' );
	$sistema_logo_1			= of_get_option( 'sistema_logo_1', '' );
	$sistema_titulo_2		= of_get_option( 'sistema_titulo_2', '' );
	$sistema_contenido_2	= of_get_option( 'sistema_contenido_2', '' );
	$sistema_logo_2			= of_get_option( 'sistema_logo_2', '' );
	$sistema_titulo_33		= of_get_option( 'sistema_titulo_33', '' );
	$sistema_contenido_33	= of_get_option( 'sistema_contenido_33', '' );
	$sistema_logo_33		= of_get_option( 'sistema_logo_33', '' );

	$sistema_2				= of_get_option( 'sistema_2', '' );
	$sistema_titulo_3		= of_get_option( 'sistema_titulo_3', '' );
	$sistema_contenido_3	= of_get_option( 'sistema_contenido_3', '' );
	$sistema_logo_3			= of_get_option( 'sistema_logo_3', '' );
	$sistema_titulo_4		= of_get_option( 'sistema_titulo_4', '' );
	$sistema_contenido_4	= of_get_option( 'sistema_contenido_4', '' );
	$sistema_logo_4			= of_get_option( 'sistema_logo_4', '' );
	$sistema_titulo_44		= of_get_option( 'sistema_titulo_44', '' );
	$sistema_contenido_44	= of_get_option( 'sistema_contenido_44', '' );
	$sistema_logo_44		= of_get_option( 'sistema_logo_44', '' );

	if($sistema_1)
	{
		echo '
			<header>
				<h2 class="losCarteles__header">'.$sistema_1.'</h2>
			</header>
			';

		if($sistema_logo_1)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_1.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_1.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_1.'</p>
					</div>
				</div>
			</article>
			';
		}

		if($sistema_logo_2)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_2.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_2.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_2.'</p>
					</div>
				</div>
			</article>
			';
		}

		if($sistema_logo_33)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_33.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_33.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_33.'</p>
					</div>
				</div>
			</article>
			';
		}
	}

	if($sistema_2)
	{
		echo '
			<header>
				<h2 class="losCarteles__header">'.$sistema_2.'</h2>
			</header>
			';
		
		if($sistema_logo_3)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_3.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_3.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_3.'</p>
					</div>
				</div>
			</article>
			';
		}
		if($sistema_logo_4)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_4.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_4.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_4.'</p>
					</div>
				</div>
			</article>
			';
		}
		
		if($sistema_logo_44)
		{
			echo '
			<article class="losCarteles__articulo">
				<figure class="losCarteles__articulo__img">
					<img src="'.$sistema_logo_44.'" alt="'.get_bloginfo("name").'" />
				</figure>
				<div class="losCarteles__articulo__contenedor">
					<header class="losCarteles__articulo__header">
						<h3>'.$sistema_titulo_44.'</h3>
					</header>
					<div class="losCarteles__articulo__contenido">
						<p>'.$sistema_contenido_44.'</p>
					</div>
				</div>
			</article>
			';
		}
	}
	
	?>
	</div>
		<!-- Fin de los Carteles -->

	<!-- Un cuadro con contenido y foto -->
	<?php
	$logotipo_options = of_get_option( 'logotipo_options', '' );
	$contenido_home_options = of_get_option( 'contenido_home_options', '' );

	if($logotipo_options)
	{
		echo '
		<style type="text/css">
		.homeContenido__article
		{
			background-image:url("'.$logotipo_options.'");
		}
		</style>
		';
	}
	
	if($contenido_home_options)
	{
		echo '
		<div class="homeContenido">
			<article class="homeContenido__article">
				<div class="homeContenido__contenido">
					<p>'.$contenido_home_options.'</p>
				</div>
			</article>
		</div>
		';
	}
	
	?>
	
	<!-- fin del cuado de contenido y foto -->



		<!-- Comienzo de los Segmentos -->
		<?php // WP_Query arguments
		$args = array (
			'post_type'		=> array( 'segmentos_post_type' ),
			'order'			=> 'ASC',
			'orderby'		=> 'menu_order'
		);
		
		// The Query
		$segmentos_post_type_home = new WP_Query( $args );
		
		// The Loop
		if ( $segmentos_post_type_home->have_posts() )
		{
			echo '<section>';
			echo '<div class="losSegmentos">
					<header>
						<h2>'.__('Segmentos de Operación', 'solisem').'</h2>
					</header>
					<div class="losSegmentos__wrapper">';
			while ( $segmentos_post_type_home->have_posts() )
			{
				$segmentos_post_type_home->the_post();

				// Extrayendo información del metabox con el enlace a la página elegida 
				// $my_custom_field = get_post_custom('_wporg_meta_key');
				// echo $my_custom_field;
				?>
			
			<article class="losSegmentos__articulo">
				<div class="losSegmentos__articulo__contenedor">
					<header class="losSegmentos__articulo__header">
						<a href="<?php the_permalink();?>">
							<h3><?php the_title();?></h3>
						</a>
					</header>
					<div class="losSegmentos__articulo__contenido">
						<?php the_content();?>
					</div>
				</div>
			</article>

			<?php	}
		echo "</div></div></section>";
	} else {
		echo '<div class="losSegmentos"><header><h2>No hay nada</h2></header></div>';
		}
		// Restore original Post Data
		wp_reset_postdata();
		
		?>

<!-- Fin de los segmentos -->

<?php

	// El sector de los valores comerciales y esas vainas
	$titular_nuestros_valores	= of_get_option( 'titular_nuestros_valores', '' );
	$logotipo_nuestros_valores	= of_get_option('logotipo_nuestros_valores', '');
	$contenido_nuestros_valores	= of_get_option('contenido_nuestros_valores', '');

	if($titular_nuestros_valores)
	{
		echo '
		<style type="text/css">
		.nuestros_valores
		{
			background-image: url("'.$logotipo_nuestros_valores.'");
		}
		</style>
		<div class="nuestros_valores">
			<div class="nuestros_valores__contenido">
				<h2>'.$titular_nuestros_valores.'</h2>
				<div>'.$contenido_nuestros_valores.'</div>
			</div>
		</div>
		';
	}
	
	echo "<br />";
		
		// El loop normal
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

			endwhile;
			// Restore original Post Data
		wp_reset_postdata();
	
	?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php


do_action( 'storefront_sidebar' );
get_footer();
?>