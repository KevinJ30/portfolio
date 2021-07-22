<?php

use Timber\Timber;

$context = Timber::get_context();
$context['title'] = get_theme_mod('KevinJ30_setting_introduction_title');
$context['introduction'] = get_theme_mod('KevinJ30_setting_introduction_text');
$context['introduction_image'] = get_theme_mod('KevinJ30_setting_introduction_svg');

$context['skills'] = Timber::get_posts([
    'post_type' => 'compétence'
]);

Timber::render('pages/home/index.twig', $context);
