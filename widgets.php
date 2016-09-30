<?php

function arphabet_widgets_init() {


register_sidebar( array(
   'name'          => 'Footer Left',
   'id'            => 'footer_left',
   'before_widget' => '<div>',
   'after_widget'  => '</div>',
   'before_title'  => '<h3>',
   'after_title'   => '</h3>',
 ) );


 register_sidebar( array(
   'name'          => 'Footer Center',
   'id'            => 'footer_center',
   'before_widget' => '<div>',
   'after_widget'  => '</div>',
   'before_title'  => '<h3>',
   'after_title'   => '</h3>',
 ) );


register_sidebar( array(
   'name'          => 'Footer Right',
   'id'            => 'footer_right',
   'before_widget' => '<div>',
   'after_widget'  => '</div>',
   'before_title'  => '<h3>',
   'after_title'   => '</h3>',
 ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
