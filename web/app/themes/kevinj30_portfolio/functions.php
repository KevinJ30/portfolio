<?php
/**
 * @var string Get root directory on the project
 **/
define('WP_ROOT', dirname(dirname(dirname(dirname(__DIR__)))));

require_once WP_ROOT . '/vendor/autoload.php';

/**
 * Initialise Timber
 **/
$timber = new Timber\Timber();
