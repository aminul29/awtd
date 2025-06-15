<?php
/*
Plugin Name: Hello World Widget
Version: 1.0
Author: Md Aminul
Description: A simple hello world widget for Elementor
Author URI: https://mhdaminul.com
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// register hello world widget
function register_hello_world_widget( $widgets_manager ) {
    require_once(__DIR__ . '/widgets/hello-world-widget.php');
    $widgets_manager->register( new \Elementor_hello_world_widget() );
}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );