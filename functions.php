<?php

add_action( 'wp_enqueue_scripts', 'brittany_parent_theme_enqueue_styles' );
function brittany_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/css/parent.css' );
}

add_action( 'wp_enqueue_scripts', 'lml_child_styles' );
function lml_child_styles() {
    wp_enqueue_style('lml-styles', get_stylesheet_directory_uri() . "/css/lml-music.css" , array("parent-style") ) ;
}
