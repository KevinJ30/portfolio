<?php

namespace KevinJ30\TwigExtension\Elements;

use Timber\Twig_Function;
use Twig\Environment;

/**
 * Class RatingStarsTwigExtension
 * @package KevinJ30\TwigExtension\Elements
 **/
class RatingStarsTwigExtension
{
    public function __construct()
    {
        add_filter('timber/twig', [$this, 'register']);
    }

    public function register(Environment $twig) : Environment
    {
        $twig->addFunction(new Twig_Function('rates', [$this, 'createRating']));
        return $twig;
    }

    public function createRating(int $note, int $maxNotes = 5) : string
    {
        $stars = '';

        for ($i = 0; $i < $maxNotes; $i++) {
            $classname = $i < floor($note) ? 'star-active' : null;

            $stars .= '<svg class="icon icon-star '. $classname .'">
                <use xlink:href="'. get_template_directory_uri() .'/img/sprite.svg#star"></use>
            </svg>';
        }

        return $stars;
    }
}
