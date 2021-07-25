<?php
/**
 * @var string Get root directory on the project
 **/

use App\Domain\Configuration\Customizer\IntroductionTextCustomizer;
use App\Domain\Projects\PostType\ProjectPostType;
use App\Domain\Skills\PostType\SkillPostType;
use KevinJ30\TwigExtension\Elements\RatingStarsTwigExtension;

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
new ProjectPostType();



new RatingStarsTwigExtension();
