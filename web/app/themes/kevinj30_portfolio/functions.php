<?php
/**
 * @var string Get root directory on the project
 **/

use App\Customizer\Configuration\Introduction\KevinJ30_IntroductionTextCustomizer;

define('WP_ROOT', dirname(dirname(dirname(dirname(__DIR__)))));

require_once WP_ROOT . '/vendor/autoload.php';

/**
 * Initialise App
 **/
$timber = new Timber\Timber();
$init = new \App\KevinJ30Init();


/**
 * Customizer App
 **/
new KevinJ30_IntroductionTextCustomizer();

/**
 * Post type
 **/
new \App\PostType\Skills\KevinJ30_SkillPostType();
