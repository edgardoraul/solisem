<?php

// Register Custom Post Type
function segmentos_home() {

	$labels = array(
		'name'                  => _x( 'Segmentos', 'Post Type General Name', 'solisem' ),
		'singular_name'         => _x( 'Segmento', 'Post Type Singular Name', 'solisem' ),
		'menu_name'             => __( 'Segmentos del Home', 'solisem' ),
		'name_admin_bar'        => __( 'Segmentos del Home', 'solisem' ),
		'archives'              => __( 'Segmento Archives', 'solisem' ),
		'parent_item_colon'     => __( 'Segmento superior:', 'solisem' ),
		'all_items'             => __( 'Todos los Segmentos', 'solisem' ),
		'add_new_item'          => __( 'Añadir nuevo Segmento', 'solisem' ),
		'add_new'               => __( 'Añadir uno nuevo', 'solisem' ),
		'new_item'              => __( 'Nuevo Segmento', 'solisem' ),
		'edit_item'             => __( 'Editar Segmento', 'solisem' ),
		'update_item'           => __( 'Actualizar Segmento', 'solisem' ),
		'view_item'             => __( 'Ver Segmento', 'solisem' ),
		'search_items'          => __( 'Buscar Segmentos', 'solisem' ),
		'not_found'             => __( 'No hay Segmentos', 'solisem' ),
		'not_found_in_trash'    => __( 'No hay Segmentos en la papelera', 'solisem' ),
		'featured_image'        => __( 'Imagen destacada', 'solisem' ),
		'set_featured_image'    => __( 'Colocar una imagen destacada', 'solisem' ),
		'remove_featured_image' => __( 'Remover una imagen destacada', 'solisem' ),
		'use_featured_image'    => __( 'Usar como Imagen destacada', 'solisem' ),
		'insert_into_item'      => __( 'Insertar dentro del Segmento', 'solisem' ),
		'uploaded_to_this_item' => __( 'Cargado en este Segmento', 'solisem' ),
		'items_list'            => __( 'Listado de los Segmentos', 'solisem' ),
		'items_list_navigation' => __( 'Listado de navegación de Segmentos', 'solisem' ),
		'filter_items_list'     => __( 'Filtrar listado de los Segmentos', 'solisem' ),
	);
	$args = array(
		'label'                 => __( 'Segmento', 'solisem' ),
		'description'           => __( 'Segmentos de la home', 'solisem' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes', ),
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
	register_post_type( 'segmentos_post_type', $args );

}
add_action( 'init', 'segmentos_home', 0 );

;?>