<?php
/**
 * @var string Get root directory on the project
 **/

use App\Customizer\Configuration\Introduction\IntroductionTextCustomizer;
use App\PostType\Skills\SkillPostType;

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
$introductionCustomizer = new IntroductionTextCustomizer();

/**
 * Post type
 **/
new SkillPostType();
