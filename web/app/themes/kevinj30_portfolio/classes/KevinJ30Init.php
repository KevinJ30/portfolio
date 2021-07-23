<?php
namespace App;

/**
 * Class KevinJ30Init
 * @package App
 **/
class KevinJ30Init
{
    const ENTRY_CSS = "app.css";
    const ENTRY_JAVASCRIPT = "app.js";

    public function __construct()
    {
        // Supports
        add_theme_support('post-thumbnails');

        // Actions
        add_action('wp_enqueue_scripts', [$this, 'assetsRegister']);
        add_action('init', [$this, 'resetWp']);
    }

    /**
     * Register assets projects
     **/
    public function assetsRegister() : void
    {
        wp_enqueue_style('KevinJ30-app', get_template_directory_uri() . '/dist/'. self::ENTRY_CSS, [], null);
        wp_enqueue_script('KevinJ30-app', get_template_directory_uri() . '/dist/'. self::ENTRY_JAVASCRIPT, [], null);
    }

    /**
     * Disable useless wp components
     **/
    public function resetWp() : void
    {
        if (!is_admin()) {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        }
    }
}
