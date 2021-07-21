<?php

use Timber\Timber;

$context = Timber::get_context();

Timber::render('pages/home/index.twig', $context);
