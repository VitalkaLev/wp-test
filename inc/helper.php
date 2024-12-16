<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dd($data){
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

function theme_text($data) {
    if (isset($data) && !empty($data) && is_string($data)) {
        $allowed_tags = array_merge(
            wp_kses_allowed_html('post'),
            [
                'iframe' => [
                    'src'             => [],
                    'width'           => [],
                    'height'          => [],
                    'allowfullscreen' => []
                ]
            ]
        );

        return wp_kses($data, $allowed_tags);
    }
    return '';
}