<?php
/**
* functions.php
* @package WordPress
* @subpackage solisem
* @since solisem 0.1
* Text Domain: solisem
*/

// Tiene las plantillas, bah! Algunas...creo
require_once 'inc/storefront-template-functions.php';

// Detector de móviles
require_once "includes/02._wp-mobile-detect.php";

// Configuración del slider
require_once "includes/03._el_slider.php";

// Regenerar los thumbnails
require_once "includes/04._regenerate-thumbnails.php";
/*
// Cargar Panel de Opciones
if ( !function_exists( 'optionsframework_init' ) )
{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/05._options-framework.php';
}

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function()
{
	jQuery('#example_showhidden').click(function()
	{
		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined)
	{
		jQuery('#section-example_text_hidden').show();
	}
});
</script>

<?php
}
*/

// Sitemap en xml
require_once "includes/06._sitemap.php";

// Las miniaturas
require_once "includes/09._thumbnails.php";

// Minificación del html
// require_once "includes/20._minificacion.php";

// Los segmentos centrales de la home
require_once "includes/21._segmentos.php";

// Opciones de la plantilla
require_once "includes/options-framework.php";

// Permitir svg en las imágenes para cargar.
function cc_mime_types( $mimes )
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


// Detén las adivinanzas de URLs de WordPress
add_filter( 'redirect_canonical', 'stop_guessing' );
function stop_guessing( $url )
{
	if( is_404() )
	{
		return false;
	}
	return $url;
}

// Deshabilitar Iconos Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter( 'emoji_svg_url', '__return_false' );

// Remover la API REST
function remove_api ()
{
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( 'after_setup_theme', 'remove_api' );

// Remover cosas raras de Wordpress
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'dns-prefetch' );

// Remover clases automáticas del the_post_thumbnail
function the_post_thumbnail_remove_class( $output )
{
	$output = preg_replace( '/class=".*?"/', '', $output );
	return $output;
}
add_filter( 'post_thumbnail_html', 'the_post_thumbnail_remove_class'  );

// Remover atributos de ancho y alto de las imágenes insertadas
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to__ditor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html )
{
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
};

// Desactivar el script de embebidos
function my_deregister_scripts()
{
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// Cambiar el logo del login y la url del mismo y el título
function custom_login_logo()
{
	// echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/img/favicon.png" />';
	echo '<style type="text/css">
		body.login
		{
			background: #dddddd !important;
			height: 100% !important;
		}
		h1
		{
			padding-top: 20px !important;
		}
		h1 a
		{
			background:  #ffffff url(' . get_bloginfo('stylesheet_directory') . '/img/logo.png) center center no-repeat !important;
			background-size: cover !important;
			border-left: 4px solid #FC4349;
			height: 100px !important;
			overflow: hidden !important;
			width: 100% !important;
		}
		div#login
		{
			padding: 0 !important;
		}
		.message, #loginform, h1 a
		{
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		div.anr_captcha_field
		{
			margin-bottom: 1em !important;
		}
		</style>';
};
add_action( 'login_head', 'custom_login_logo', 1 );
function the_url( $url )
{
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );
function change_wp_login_title()
{
	return get_option('blogname');
}
add_filter( 'login_headertext', 'change_wp_login_title' );


// Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __( '¡Sal de mi jardín! ¡AHORA MISMO!', 'solisem' );
};
add_filter( 'login__rrors', 'no__rrors_please' );

// Remover los créditos
require_once "storefront-template-functions.php";

// Eliminar el footer por defecto de Storefront y añadir uno personalizado
add_action( 'init', 'bld_eliminar_footer_storefront', 10 );
function bld_eliminar_footer_storefront()
{
	remove_action( 'storefront_footer', 'storefront_credit', 20 );
	add_action( 'storefront_footer', 'bld_personalizar_footer_storefront', 10 );
}
function bld_personalizar_footer_storefront()
{
	// Variables de contenido
	$email_options				= of_get_option( 'email_options', '' );
	$telefono_options			= of_get_option( 'telefono_options', '' );
	$celular_options			= of_get_option( 'celular_options', '' );
	$direccion_options			= of_get_option( 'direccion_options', '' );
	$localidad_options			= of_get_option( 'localidad_options', '' );
	$departamento_options		= of_get_option( 'departamento_options', '' );
	$codigopostal_options		= of_get_option( 'codigopostal_options', '' );
	$provincia_options			= of_get_option( 'provincia_options', '' );
	$pais_options				= of_get_option( 'pais_options', '' );
	$horario_options			= of_get_option( 'horario_options', '' );
	$googlemaps_options			= of_get_option( 'googlemaps_options', '' );

	$google_analitycs_options	= of_get_option( 'google_analitycs_options', '' );

	$facebook_options 			= of_get_option( 'facebook_options', '' );
	$twitter_options			= of_get_option( 'twitter_options', '' );
	$instagram_options			= of_get_option( 'instagram_options', '' );
	$linkedin_options			= of_get_option( 'linkedin_options', '' );


?>
<div class="site-info">
		
		
		
	<?php

	if($googlemaps_options)
	{
		if( is_page('quienes-somos') || is_home() || is_front_page() )
		{
			echo '<h2>'.__('Ubicación', 'solisem').'</h2>' . $googlemaps_options;
		}
	}
	
	
	if($email_options)
	{
		// El título
		echo '<br /><br /><br />';
		echo '<h2>'.__('Contacto:', 'solisem').'</h2>';
		
		// El formulario
		if( is_page('quienes-somos') || is_home() || is_front_page() )
		{
			echo '<div class="formularioContacto">'. do_shortcode( '[contact-form-7 id="135" title="Formulario de contacto"]' ). '</div>';
		}
		
		// El email
		echo '<p><i class="fas fa-envelope-square fa-lg"></i> ' . $email_options;
		
		if($telefono_options)
		{
			echo '<br /><br /><i class="fas fa-phone-square-alt fa-lg"></i> ' . $telefono_options . '<br />';
		}
		
		if($celular_options)
		{
			// Se oculta en desktop
			echo '<br class="hidden-desktop" /><a class="hidden-desktop" href="whatsapp://send?phone=' . $celular_options . '&text=Hola Solisem. "><i class="fab fa-whatsapp-square fa-lg"></i></a> <span class="hidden-desktop">' . $celular_options . '</span>';
			
			// Se muestra sólo en desktop
			echo '<br class="hidden-tableta hidden-mobile" /><a class="hidden-tableta hidden-mobile" href="https://web.whatsapp.com/send?l=en&phone=' . $celular_options . '&text=Hola Solisem. "><i class="fab fa-whatsapp-square fa-lg"></i></a> <span class="hidden-mobile hidden-tableta">' . $celular_options . '</span>';
		}
		echo '</p>';
	}

	
	if($direccion_options)
	{
		echo '<h2>'.__('Showroom:', 'solisem').'</h2><p>' . $direccion_options;
		
		if($localidad_options)
		{
			echo ' - ' . $localidad_options;
		}

		if($departamento_options)
		{
			echo ' - ' . $departamento_options;
		}

		if($codigopostal_options)
		{
			echo ' - ' . $codigopostal_options;
		}

		if($provincia_options)
		{
			echo ' - ' . $provincia_options;
		}

		if($pais_options)
		{
			echo ' - ' . $pais_options;
		}

		echo '</p>';
	}

	

	if($horario_options)
	{
		echo '<h2>'.__('Horario de Atención:', 'solisem').'</h2><p>' . $horario_options . '</p>';
	}
	
	?>

	<!-- Las redes sociales -->
	<div class="align-center redes_sociales">
		<?php

		// Facebook
		if($facebook_options)
		{
			echo '<a href="//' . $facebook_options . '" title="Facebook" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a> ';
		}

		// Instagram
		if($instagram_options)
		{
			echo '<a href="//www.instagram.com/' . $instagram_options . '" title="Instagram" target="_blank"><i class="fab fa-instagram-square fa-3x"></i></a> ';
		}

		// Twitter
		if($twitter_options)
		{
			echo '<a href="//' . $twitter_options . '" title="Twitter" target="_blank"><i class="fab fa-twitter-square fa-3x"></i></a> ';
		}

		// Linkedin
		if($linkedin_options)
		{
			echo '<a href="//' . $linkedin_options . '" title="Linkedin" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a> ';
		}
		?>		
		
	</div>

	<!-- Los cŕeditos -->
	<div class="align-center separador">
		<h2>&copy; <?php echo get_the_date( 'Y' ) . ' ' . get_bloginfo( 'name' ) ; ?></h2>
	</div>


	<!-- Ir hacia arriba -->
	<span id="ir_arriba" class="gotop">
		<a href="#" title="Ir arriba">&UpArrow;</a>
	</span>

</div>
<?php }

?>