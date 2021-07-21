<?php

use Timber\Timber;

$context = Timber::get_context();

Timber::render('pages/index.twig', $context);
