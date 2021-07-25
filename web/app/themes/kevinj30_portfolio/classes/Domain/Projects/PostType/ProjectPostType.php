<?php

namespace App\Domain\Projects\PostType;

use KevinJ30\PostType\AbstractPostType;

class ProjectPostType extends AbstractPostType
{
    public function __construct()
    {
        parent::__construct(
            'Projets',
            'Projet',
            'Mes projets',
            'dashicons-archive',
            ['title', 'editor', 'custom-fields', 'thumbnail']
        );
    }
}
