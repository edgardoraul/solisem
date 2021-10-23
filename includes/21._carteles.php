<?php

// Register Custom Post Type
function carteles_home() {

	$labels = array(
		'name'                  => _x( 'Sistemas', 'Post Type General Name', 'solisem' ),
		'singular_name'         => _x( 'Sistema', 'Post Type Singular Name', 'solisem' ),
		'menu_name'             => __( 'Sistemas del Home', 'solisem' ),
		'name_admin_bar'        => __( 'Sistemas del Home', 'solisem' ),
		'archives'              => __( 'Sistema Archives', 'solisem' ),
		'parent_item_colon'     => __( 'Sistema superior:', 'solisem' ),
		'all_items'             => __( 'Todos los sistemas', 'solisem' ),
		'add_new_item'          => __( 'Añadir nuevo sistema', 'solisem' ),
		'add_new'               => __( 'Añadir uno nuevo', 'solisem' ),
		'new_item'              => __( 'Nuevo sistema', 'solisem' ),
		'edit_item'             => __( 'Editar sistema', 'solisem' ),
		'update_item'           => __( 'Actualizar sistema', 'solisem' ),
		'view_item'             => __( 'Ver sistema', 'solisem' ),
		'search_items'          => __( 'Buscar sistemas', 'solisem' ),
		'not_found'             => __( 'No hay sistemas', 'solisem' ),
		'not_found_in_trash'    => __( 'No hay Sistemas en la papelera', 'solisem' ),
		'featured_image'        => __( 'Imagen destacada', 'solisem' ),
		'set_featured_image'    => __( 'Colocar una imagen destacada', 'solisem' ),
		'remove_featured_image' => __( 'Remover una imagen destacada', 'solisem' ),
		'use_featured_image'    => __( 'Usar como Imagen destacada', 'solisem' ),
		'insert_into_item'      => __( 'Insertar dentro del sistema', 'solisem' ),
		'uploaded_to_this_item' => __( 'Cargado en este sistema', 'solisem' ),
		'items_list'            => __( 'Listado de los sistemas', 'solisem' ),
		'items_list_navigation' => __( 'Listado de navegación de sistemas', 'solisem' ),
		'filter_items_list'     => __( 'Filtrar listado de los sistemas', 'solisem' ),
	);
	$args = array(
		'label'                 => __( 'Sistema', 'solisem' ),
		'description'           => __( 'Sistemas de la home', 'solisem' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-exerpt-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'carteles_post_type', $args );

}
add_action( 'init', 'carteles_home', 0 );

;?>