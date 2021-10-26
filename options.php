<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
/*function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}*/
function optionsframework_option_name()
{

	// Nombre de la plantilla
	$themename = wp_get_theme();
	$themename = preg_replace("/W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options()
{
	// Pestaña Configuración general
	$options[]	=	array(
	'name'	=>	__('Configuración General', 'options_framework_theme'),
	'type'	=>	'heading');

	// Cambio del logo
	$options[]	=	array(
	'name'		=>	__('Imagen de la oficina', 'options_framework_theme'),
	'desc'		=>	__('Selecciona una foto grande de 1360x768px de mínimo.', 'options_framework_theme'),
	'id'		=>	'logotipo_options',
	'type'		=>	'upload');

	// Titular del Portfolio de la home
	$options[]	=	array(
		'name'			=>	__('Titular que se desee mostrar', 'options_framework_theme'),
		'desc'			=>	__('Introduca un titular importante.', 'options_framework_theme'),
		'id'			=>	'titular_home_options',
		'placeholder'	=>	__('Titular de ejemplo...', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido o mensaje para el porfolio de la home
	$options[]	=	array(
		'name'			=>	__('Mensaje importante a mostrar en la home', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un contenido o mensaje para la home.', 'options_framework_theme'),
		'id'			=>	'contenido_home_options',
		'placeholder'	=>	__('Contenido de ejemplo...', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Meta: keywords
	$options[]	=	array(
		'name'			=>	__('Meta: Palabras claves', 'options_framework_theme'),
		'desc'			=>	__('Introducir palabras (separadas por comas) claves de la web que son útiles para algunos buscadores. Muy importantes para SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_keywords_options',
		'placeholder'	=>	'palabra1, palabra2, palabra3...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Meta: Descripción
	$options[]	=	array(
		'name'			=>	__('Meta: Descripción de la web', 'options_framework_theme'),
		'desc'			=>	__('Introducir una descripción breve acerca de lo que trata esta web. Muy importante para el SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_description_options',
		'placeholder'	=>	__('Empresa XXX dedicada a la YYY...', 'options_framework_theme'),
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Google Analitics
	$options[]	=	array(
		'name'			=>	__('Google Analitycs', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el script de Google Analitycs.', 'options_framework_theme'),
		'id'			=>	'google_analitycs_options',
		'placeholder'	=>	'var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-40089469-1"]); _gaq.push(["_trackPageview"]); etc...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);
/*
	// Obterner claves privadas y publicas de reCaptcha
	$options[] = array(
		'name' 			=> __('Conseguir las claves públicas y privadas para Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> '<a class="button-primary" style="float:none;" target="_blank" title="Google reCaptcha" href="https://www.google.com/recaptcha/admin">' . __('Obtener', 'options_framework_theme') . '</a>',
		'id' 			=> 'obtencion',
		'placeholder'	=> '',
		'class'			=> '',
		'type' 			=> 'info',
	);


	// Clave privada de google recaptcha
	$options[] = array(
		'name' 			=> __('Clave Secreta de Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su clave secreta.', 'options_framework_theme'),
		'id' 			=> 'reCaptchaClavePrivada',
		'placeholder'	=> 'jf8erpandoasd98wepa...',
		'class'			=> '',
		'type' 			=> 'text',
	);

	// Clave pública de google recaptcha
	$options[] = array(
		'name' 			=> __('Clave pública de Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su clave pública.', 'options_framework_theme'),
		'id' 			=> 'reCaptchaClavePublica',
		'placeholder'	=> 'qwoeg9384sd98wepa...',
		'class'			=> '',
		'type' 			=> 'text',
	);*/

	/*====================================================================================*/
	// Pestaña Sistemas Industriales
	$options[]	=	array(
		'name'	=>	__('Sistemas Industriales', 'options_framework_theme'),
		'type'	=>	'heading');
	
		// Primer tipo de sistema
		$options[]	=	array(
			'name'			=>	__('Título para el primer tipo de sistema', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_1',
			'placeholder'	=>	__('Tipo de Sistemas xxx', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Primer titulo del primer sistema
		$options[]	=	array(
			'name'			=>	__('Título para el sistema 1', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_titulo_1',
			'placeholder'	=>	__('Sistemas tipo xxx...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Contenido o descripción
		$options[]	=	array(
			'name'			=>	__('Mensaje o descripción', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un contenido.', 'options_framework_theme'),
			'id'			=>	'sistema_contenido_1',
			'placeholder'	=>	__('Contenido de ejemplo...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'textarea',
		);

		// Icono o imagen descriptiva
		$options[]	=	array(
			'name'		=>	__('Icono o imagen que identifica al sistema 1', 'options_framework_theme'),
			'desc'		=>	__('Selecciona una imagen, tamaño 100px x 100px.', 'options_framework_theme'),
			'id'		=>	'sistema_logo_1',
			'type'		=>	'upload');
		

		// Primer titulo del segundo sistema
		$options[]	=	array(
			'name'			=>	__('Título para el sistema 2', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_titulo_2',
			'placeholder'	=>	__('Sistemas tipo xxx...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Contenido o descripción
		$options[]	=	array(
			'name'			=>	__('Mensaje o descripción', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un contenido.', 'options_framework_theme'),
			'id'			=>	'sistema_contenido_2',
			'placeholder'	=>	__('Contenido de ejemplo...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'textarea',
		);

		// Icono o imagen descriptiva
		$options[]	=	array(
			'name'		=>	__('Icono o imagen que identifica al sistema 2', 'options_framework_theme'),
			'desc'		=>	__('Selecciona una imagen, tamaño 100px x 100px.', 'options_framework_theme'),
			'id'		=>	'sistema_logo_2',
			'type'		=>	'upload');
		
		
		// Segundo tipo de sistema
		$options[]	=	array(
			'name'			=>	__('Título para el segundo tipo de sistema', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_2',
			'placeholder'	=>	__('Tipo de Sistemas 2 xxx', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Primer titulo del primer sistema
		$options[]	=	array(
			'name'			=>	__('Título para el sistema 3', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_titulo_3',
			'placeholder'	=>	__('Sistemas tipo xxx...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Contenido o descripción
		$options[]	=	array(
			'name'			=>	__('Mensaje o descripción', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un contenido.', 'options_framework_theme'),
			'id'			=>	'sistema_contenido_3',
			'placeholder'	=>	__('Contenido de ejemplo...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'textarea',
		);

		// Icono o imagen descriptiva
		$options[]	=	array(
			'name'		=>	__('Icono o imagen que identifica al sistema 3', 'options_framework_theme'),
			'desc'		=>	__('Selecciona una imagen, tamaño 100px x 100px.', 'options_framework_theme'),
			'id'		=>	'sistema_logo_3',
			'type'		=>	'upload');
		

		// Primer titulo del segundo sistema
		$options[]	=	array(
			'name'			=>	__('Título para el sistema 4', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un título descriptivo.', 'options_framework_theme'),
			'id'			=>	'sistema_titulo_4',
			'placeholder'	=>	__('Sistemas tipo xxx...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'text',
		);

		// Contenido o descripción
		$options[]	=	array(
			'name'			=>	__('Mensaje o descripción', 'options_framework_theme'),
			'desc'			=>	__('Introduzca un contenido.', 'options_framework_theme'),
			'id'			=>	'sistema_contenido_4',
			'placeholder'	=>	__('Contenido de ejemplo...', 'options_framework_theme'),
			'class'			=>	'',
			'type'			=>	'textarea',
		);

		// Icono o imagen descriptiva
		$options[]	=	array(
			'name'		=>	__('Icono o imagen que identifica al sistema 4', 'options_framework_theme'),
			'desc'		=>	__('Selecciona una imagen, tamaño 100px x 100px.', 'options_framework_theme'),
			'id'		=>	'sistema_logo_4',
			'type'		=>	'upload');
	
	
	/* =================== Pestaña Redes Sociales ============================== */
	$options[]	=	array(
	'name'	=>	__('Redes Sociales', 'options_framework_theme'),
	'type'	=>	'heading' );

	// Facebook
	$options[] = array(
		'name'			=>	__('Facebook', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el enlace a Facebook.', 'options_framework_theme'),
		'id'			=>	'facebook_options',
		'class'			=>	'',
		'placeholder'	=>	'www.facebook.com/usuario',
		'type'			=>	'text',
	);


	// Twitter
	$options[] = array(
		'name' 			=> __('Twitter', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su enlace a Twitter.', 'options_framework_theme'),
		'id' 			=> 'twitter_options',
		'placeholder'	=> 'www.twitter.com/usuario',
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Instagram
	$options[] = array(
		'name' 			=> __('Instagram', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su usuario de Instagram.', 'options_framework_theme'),
		'id' 			=> 'instagram_options',
		'placeholder' 	=> '@usuario_de_instagram',
		'class'			=> '',
		'type' 			=> 'text',
	);

	// LinkedIn
	$options[] = array(
		'name' 			=> __('LinkedIn', 'options_framework_theme'),
		'desc'			=> __('Introduzca su enlace al perfil de LinkedIn.', 'options_framework_theme'),
		'id' 			=> 'linkedin_options',
		'placeholder' 	=> 'www.linkedin.com/usuario',
		'class' 		=> '',
		'type' 			=> 'text',
	);


	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	$options[] = array(
	'name' => __('Datos de Contacto', 'options_framework_theme'),
	'type' => 'heading');

	// Email de contacto
	$options[] = array(
		'name' 			=> __('E-mail de contacto', 'options_framework_theme'),
		'desc' 			=> __('Introduzca el Email de contacto, se mostrará al pie del sitio web en un ícono.', 'options_framework_theme'),
		'id' 			=> 'email_options',
		'placeholder' 	=> 'tu-mail@lo-que-sea.com.ar',
		'class'			=> '',
		'type'			=> 'text',
	);

	// Teléfono Fijo
	$options[] = array(
		'name' 			=> __('Teléfono Fijo', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su teléfono fijo incluyendo el código de área.', 'options_framework_theme'),
		'id' 			=> 'telefono_options',
		'placeholder' 	=> '0351-4882213',
		'class' 		=> 'mini',
		'type' 			=> 'text',
	);

	// Teléfono Celular
	$options[] = array(
		'name' 			=> __('Celular con WhatsApp', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su teléfono celular incluyendo el código de área.', 'options_framework_theme'),
		'id' 			=> 'celular_options',
		'placeholder' 	=> '+549261882213',
		'class' 		=> 'mini',
		'type' 			=> 'text',
	);

	// Dirección
	$options[] = array(
		'name' 			=> __('Dirección', 'options_framework_theme'),
		'desc' 			=> __('Introduzca calle, número, piso, departamento.', 'options_framework_theme'),
		'id' 			=> 'direccion_options',
		'placeholder' 	=> __('Man Sartín 453, Dpto. 3°A', 'options_framework_theme'),
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Localidad
	$options[] = array(
		'name' 			=> __('Localidad', 'options_framework_theme'),
		'desc' 			=> __('Ciudad, pueblo.', 'options_framework_theme'),
		'id' 			=> 'localidad_options',
		'placeholder' 	=> __('Las Catitas', 'options_framework_theme'),
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Departamento
	$options[] = array(
		'name' 			=> __('Departamento', 'options_framework_theme'),
		'desc' 			=> __('Departamento, partido, distrito o región.', 'options_framework_theme'),
		'id' 			=> 'departamento_options',
		'placeholder' 	=> __('Tulumba', 'options_framework_theme'),
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Código Postal
	$options[] = array(
		'name' 			=> __('Código Postal', 'options_framework_theme'),
		'desc' 			=> __('Código Postal.', 'options_framework_theme'),
		'id' 			=> 'codigopostal_options',
		'placeholder' 	=> '5001',
		'class' 		=> 'mini',
		'type' 			=> 'text',
	);

	// Provincia
	$options[] = array(
		'name' 			=> __('Provincia', 'options_framework_theme'),
		'desc' 			=> __('Provincia.', 'options_framework_theme'),
		'id' 			=> 'provincia_options',
		'placeholder' 	=> __('Tierra del Fuego', 'options_framework_theme'),
		'class' 		=> 'mini',
		'type' 			=> 'text',
	);

	// País
	$options[] = array(
		'name' 			=> __('País', 'options_framework_theme'),
		'desc' 			=> __('País donde se encuentra la empresa.', 'options_framework_theme'),
		'id' 			=> 'pais_options',
		'placeholder' 	=> __('República no tan Checa', 'options_framework_theme'),
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Días y horario de atención al público
	$options[] = array(
		'name' 			=> __('Horario de atención', 'options_framework_theme'),
		'desc' 			=> __('Introduzca los días de la semana y el horario de atención al público.', 'options_framework_theme'),
		'id' 			=> 'horario_options',
		'placeholder' 	=> __('Domingos a Martes; de 2 de la tarde a 14hs', 'options_framework_theme'),
		'class' 		=> '',
		'type' 			=> 'text',
	);

	// Google Maps
	$options[]	=	array(
		'name'			=>	__('Ubicación en el mapa', 'options_framework_theme'),
		'desc'			=>	__('Pegar aquí el código que te brinda Google Maps para mostrar tu ubicación real, en modo HTML. Asegurate de poner width="100%" y heigth="350".', 'options_framework_theme'),
		'id'			=>	'googlemaps_options',
		'class'			=>	'',
		'type'			=>	'editor',
	);

	return $options;
}
