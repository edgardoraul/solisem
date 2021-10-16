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

// Carteles centrales de la home
require_once "includes/24._carteles_centrales.php";

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
		echo '<h2>Ubicación</h2>'.$googlemaps_options;
	}

	if($email_options)
	{
		echo '<p><h2>Contacto:</h2><i class="fas fa-envelope-square fa-lg"></i> '.$email_options;
	
		if($telefono_options)
		{
			echo '<br /><i class="fas fa-phone-square-alt fa-lg"></i> '.$telefono_options;
		}
	
		if($celular_options)
		{
			echo '<br /><a href="whatsapp://send?phone='.$celular_options.'&text=Hola Solisem. "><i class="fab fa-whatsapp-square fa-lg"></i></a> '.$celular_options;
		}
		echo '</p>';
	}

	if($direccion_options)
	{
		echo '<p><h2>Showroom:</h2> '.$direccion_options;
		
		if($localidad_options)
		{
			echo ' - '.$localidad_options;
		}

		if($departamento_options)
		{
			echo ' - '.$departamento_options;
		}

		if($codigopostal_options)
		{
			echo ' - '.$codigopostal_options;
		}

		if($provincia_options)
		{
			echo ' - '.$provincia_options;
		}

		if($pais_options)
		{
			echo ' - '.$pais_options;
		}

		echo '</p>';
	}

	

	if($horario_options)
	{
		echo '<p><h2>Horario de Atención:</h2> '.$horario_options.'</p>';
	}
	
	?>

	<!-- Las redes sociales -->
	<div class="align-center redes_sociales">
		<?php

		// Facebook
		if($facebook_options)
		{
			echo '<a href="//' . $facebook_options . '" title="Facebook" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a> ';
		}

		// Instagram
		if($instagram_options)
		{
			echo '<a href="//www.instagram.com/' . $instagram_options . '" title="Instagram" target="_blank"><i class="fab fa-instagram-square fa-2x"></i></a> ';
		}

		// Twitter
		if($twitter_options)
		{
			echo '<a href="//www.twitter.com/' . $twitter_options . '" title="Twitter" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a> ';
		}

		// Linkedin
		if($linkedin_options)
		{
			echo '<a href="//' . $linkedin_options . '" title="Linkedin" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a> ';
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