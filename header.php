<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package solisem
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

<?php

// SEO para la home
$titular_home_options		= of_get_option( 'titular_home_options', '' );
$logotipo_options			= of_get_option( 'logotipo_options', '' );
$titular_home_options		= of_get_option( 'titular_home_options', '' );
$contenido_home_options		= of_get_option( 'contenido_home_options', '' );
$meta_keywords_options		= of_get_option( 'meta_keywords_options', '' );
$meta_description_options	= of_get_option( 'meta_description_options', '' );

// Comprobando que no sea un post ni un producto
if( is_home() || is_front_page() || is_category() || is_tag() || is_search() || is_404() || is_tax() )
{
	echo '<meta description="' . $meta_description_options . '" />';
	
	// Salto de línea.
	echo "\n";
	
	echo '<meta keywords="' . $meta_keywords_options . '" />';
}
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/slider.css" />
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' );
		?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		do_action( 'storefront_content_top' );
