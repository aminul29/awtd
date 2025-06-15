<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_hello_world_widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hello-world';
    }

    public function get_title() {
        return esc_html__( 'Hello World', 'elementor-hello-world-widget' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_custom_help_url() {
        return 'https://mhdaminul.com';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_keywords() {
        return [ 'hello', 'world' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'elementor-hello-world-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'elementor-hello-world-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Hello World', 'elementor-hello-world-widget' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        echo '<div class="bg-white border-gray-600 p-4 shodow-md hover:shadow-lg">';
        echo '<h1>' . $settings['title'] . '</h1>';
        echo '</div>';
    }
}