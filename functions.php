<?php

add_action( 'wp_enqueue_scripts', 'brittany_parent_theme_enqueue_styles' );

function brittany_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/css/parent.css' );

}
