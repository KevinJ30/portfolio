<?php

use Timber\Timber;

$context = Timber::get_context();
$context['title'] = get_theme_mod('KevinJ30_setting_introduction_title');
$context['introduction'] = get_theme_mod('KevinJ30_setting_introduction_text');
$context['introduction_image'] = get_theme_mod('KevinJ30_setting_introduction_svg');

$context['skills'] = Timber::get_posts([
    'post_type' => 'compétence'
]);

<<<<<<< HEAD
=======
$context['projects'] = Timber::get_posts([
   'post_type' => 'Projet'
]);

>>>>>>> 293404d7f5298154f56dbbf46e994400df647800
Timber::render('pages/home/index.twig', $context);
