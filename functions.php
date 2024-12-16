<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('_S_VERSION', '1.0.0');
define('PATH', get_template_directory());
define('PATH_URL', esc_url( get_template_directory_uri()));
define('THEME', 'test-theme');

require PATH . '/inc/enqueues.php';
require PATH . '/inc/helper.php';
require PATH . '/inc/contact-form-7.php';
require PATH . '/inc/telegram-sender.php';

