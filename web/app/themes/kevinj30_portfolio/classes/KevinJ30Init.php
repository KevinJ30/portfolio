<?php
namespace App;

class KevinJ30Init
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'assetsRegister']);
    }

    public function assetsRegister()
    {
        wp_enqueue_style('KevinJ30-app', get_template_directory_uri() . '/dist/app.css');
        wp_enqueue_script('KevinJ30-app', get_template_directory_uri() . '/dist/app.js');
    }
}
