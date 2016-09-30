
<?php
function horarios_post_type() {


	// HORARIOS POST
	function horarios_post_type() {

	// Etiquetas para horarios
		$labels = array(
			'name'                => _x( 'Horarios' ),
			'singular_name'       => _x( 'Horario' ),
			'menu_name'           => __( 'Horarios' ),
			'parent_item_colon'   => __( 'Horario Padre' ),
			'all_items'           => __( 'Todos los Horarios' ),
			'view_item'           => __( 'Ver Horario' ),
			'add_new_item'        => __( 'Agregar Nuevo Horario' ),
			'add_new'             => __( 'Agregar Nuevo' ),
			'edit_item'           => __( 'Editar Horario' ),
			'update_item'         => __( 'Actualizar Horario' ),
			'search_items'        => __( 'Buscar Horario' ),
			'not_found'           => __( 'Sin Resultados' ),
			'not_found_in_trash'  => __( 'Sin Resultadosen la Papelera' )
		);

	// Opciones del tipo de post

		$args = array(
			'label'               => __( 'horarios' ),
			'description'         => __( 'Horarios para programación' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
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
			//'taxonomies'          => array( 'category' ),
	                //'taxonomies'		  => array('topics', 'category' ),
		);

		register_post_type( 'horarios', $args );

	}

	add_action( 'init', 'horarios_post_type', 0 );

	// DIAS PARA HORARIOS

	function horarios_taxonomies() {
	  $labels = array(
	    'name'              => _x( 'Días de Horarios'),
	    'singular_name'     => _x( 'Día de Horarios' ),
	    'search_items'      => __( 'Buscar Día' ),
	    'all_items'         => __( 'Todos' ),
	    'parent_item'       => __( 'Día Padre' ),
	    'parent_item_colon' => __( 'Día Padre:' ),
	    'edit_item'         => __( 'Editar Día' ),
	    'update_item'       => __( 'Actualizar Día' ),
	    'add_new_item'      => __( 'Agregar Nuevo Día' ),
	    'new_item_name'     => __( 'Nuevo Día' ),
	    'menu_name'         => __( 'Días de Horarios' ),
	  );
	  $args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	  );
	  register_taxonomy( 'dia', 'horarios', $args );
	}
	add_action( 'init', 'horarios_taxonomies', 0 );
