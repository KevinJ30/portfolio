<?php
namespace App\Domain\Skills\PostType;

use KevinJ30\PostType\AbstractPostType;

class SkillPostType extends AbstractPostType
{
    public function __construct()
    {
        parent::__construct(
            'Compétences',
            'Compétence',
            'Compétences',
            'dashicons-awards',
            ['title']
        );
    }
}
