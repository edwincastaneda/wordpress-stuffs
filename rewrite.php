
<?php
// Register Custom Post Type Noticia
// Post Type Key: noticia
function create_noticia_cpt() {

	$labels = array(
		'name' => __( 'Noticias', 'Post Type General Name', 'guatevision' ),
		'singular_name' => __( 'Noticia', 'Post Type Singular Name', 'guatevision' ),
		'menu_name' => __( 'Noticias', 'guatevision' ),
		'name_admin_bar' => __( 'Noticia', 'guatevision' ),
		'archives' => __( 'Archivos Noticia', 'guatevision' ),
		'attributes' => __( 'Atributos Noticia', 'guatevision' ),
		'parent_item_colon' => __( 'Padres Noticia:', 'guatevision' ),
		'all_items' => __( 'Todas las Noticias', 'guatevision' ),
		'add_new_item' => __( 'Añadir nueva Noticia', 'guatevision' ),
		'add_new' => __( 'Añadir nueva', 'guatevision' ),
		'new_item' => __( 'Nueva Noticia', 'guatevision' ),
		'edit_item' => __( 'Editar Noticia', 'guatevision' ),
		'update_item' => __( 'Actualizar Noticia', 'guatevision' ),
		'view_item' => __( 'Ver Noticia', 'guatevision' ),
		'view_items' => __( 'Ver Noticias', 'guatevision' ),
		'search_items' => __( 'Buscar Noticia', 'guatevision' ),
		'not_found' => __( 'No se encontraron Noticias.', 'guatevision' ),
		'not_found_in_trash' => __( 'Ningún Noticia encontrado en la papelera.', 'guatevision' ),
		'featured_image' => __( 'Imagen destacada', 'guatevision' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'guatevision' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'guatevision' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'guatevision' ),
		'insert_into_item' => __( 'Insertar en la Noticia', 'guatevision' ),
		'uploaded_to_this_item' => __( 'Subido a esta Noticia', 'guatevision' ),
		'items_list' => __( 'Lista de Noticias', 'guatevision' ),
		'items_list_navigation' => __( 'Navegación por el listado de Noticias', 'guatevision' ),
		'filter_items_list' => __( 'Lista de Noticias filtradas', 'guatevision' ),
	);
	$args = array(
		'label' => __( 'Noticia', 'guatevision' ),
		'description' => __( 'Tipo de puiblicacion noticias', 'guatevision' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-quote',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'post-formats', ),
		'taxonomies' => array('categoria-noticias', 'etiqueta', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => array(
			'slug' => 'noticias/%categoria-post-noticias%',
			'with_front' => false),

	);
	register_post_type( 'post-noticias', $args );

}
add_action( 'init', 'create_noticia_cpt', 0 );



ARCHIVO FUNCTIONS.php

// REWRITE URL'S

function rewrite_permalinks( $post_link, $post ){
	if ( is_object( $post ) && $post->post_type == 'post-noticias' ){
		$terms = wp_get_object_terms( $post->ID, 'categoria-post-noticias' );
		if( $terms ){
			return str_replace( '%categoria-post-noticias%' , $terms[0]->slug , $post_link );
		}
	}

	if ( is_object( $post ) && $post->post_type == 'post-espectaculos' ){
		$terms = wp_get_object_terms( $post->ID, 'categoria-post-espectaculos' );
		if( $terms ){
			return str_replace( '%categoria-post-espectaculos%' , $terms[0]->slug , $post_link );
		}
	}



	return $post_link;
}
add_filter( 'post_type_link', 'rewrite_permalinks', 1, 2 );



// REWRITE DE PAGINADORES
add_filter('init', function() {
	add_rewrite_rule(
		'^noticias/([^/]*)/([^/]*)/(\d*)?',
		'index.php?categoria-post-noticias=$matches[1]&p=$matches[2]&paged=$matches[3]',
		'top'
	);

	add_rewrite_rule(
		'^espectaculos/([^/]*)/([^/]*)/(\d*)?',
		'index.php?categoria-post-espectaculos=$matches[1]&p=$matches[2]&paged=$matches[3]',
		'top'
	);
});
