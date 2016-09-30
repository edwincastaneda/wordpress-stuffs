
<?php
function horarios_post_type() {

// Etiquetas para horarios
	$labels = array(
		'name'                => _x( 'Horarios', 'guatevision' ),
		'singular_name'       => _x( 'Horario', 'guatevision' ),
		'menu_name'           => __( 'Horarios', 'guatevision' ),
		'parent_item_colon'   => __( 'Horario Padre', 'guatevision' ),
		'all_items'           => __( 'Todos los Horarios', 'guatevision' ),
		'view_item'           => __( 'Ver Horario', 'guatevision' ),
		'add_new_item'        => __( 'Agregar Nuevo Horario', 'guatevision' ),
		'add_new'             => __( 'Agregar Nuevo', 'guatevision' ),
		'edit_item'           => __( 'Editar Horario', 'guatevision' ),
		'update_item'         => __( 'Actualizar Horario', 'guatevision' ),
		'search_items'        => __( 'Buscar Horario', 'guatevision' ),
		'not_found'           => __( 'Sin Resultados', 'guatevision' ),
		'not_found_in_trash'  => __( 'Sin Resultadosen la Papelera', 'guatevision' ),
	);

// Opciones del tipo de post

	$args = array(
		'label'               => __( 'horarios', 'guatevision' ),
		'description'         => __( 'Horarios para programación', 'guatevision' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',

		// This is where we add taxonomies to our CPT
		'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'horarios', $args );

}

add_action( 'init', 'horarios_post_type', 0 );
