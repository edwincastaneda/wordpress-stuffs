<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'contact-menu' => __( 'Contact Menu' ),
	  'boxes-menu' => __( 'Boxes Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
