<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function theme_register_styles() {
	wp_enqueue_style('theme', PATH_URL . '/assets/src/css/main.min.css', array(), _S_VERSION );
	wp_enqueue_script('main', PATH_URL . '/assets/src/js/main.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'theme_register_styles' );
