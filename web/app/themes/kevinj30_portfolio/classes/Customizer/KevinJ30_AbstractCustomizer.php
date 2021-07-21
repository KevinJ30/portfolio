<?php

namespace App\Customizer;

use WP_Customize_Manager;

/**
 * Build custom parameter on the theme
 *
 * Class KevinJ30_CustomizerInterface
 * @package App\Customizer
 **/
abstract class KevinJ30_AbstractCustomizer
{
    public function __construct()
    {
        add_action('customize_register', [$this, 'register']);
    }

    /**
     * Add section parameter
     * @param WP_Customize_Manager $wp_customizer
     **/
    abstract public function section(WP_Customize_Manager $wp_customizer) : void;

    /**
     * Add settings parameter
     * @param WP_Customize_Manager $wp_customizer
     **/
    abstract public function settings(WP_Customize_Manager $wp_customizer) : void;

    /**
     * Add control for the parameter
     * @param WP_Customize_Manager $wp_customizer
     **/
    abstract public function control(WP_Customize_Manager $wp_customizer) : void;

    /**
     * Register parameter
     * @param WP_Customize_Manager $wp_customizer
     **/
    public function register(WP_Customize_Manager $wp_customizer) : void
    {
        $this->section($wp_customizer);
        $this->settings($wp_customizer);
        $this->control($wp_customizer);
    }
}
