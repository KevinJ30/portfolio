<?php
namespace App\PostType\Skills;

use App\PostType\AbstractPostType;

class KevinJ30_SkillPostType extends AbstractPostType
{
    public function __construct()
    {
        parent::__construct('Compétences', 'Compétence', 'Compétences');
    }

    protected function arguments() : array
    {
        return [
            'label'               => __($this->name),
            'description'         => __('Tous sur la' . $this->name),
            'labels'              => $this->label(),
            // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
            'supports'            => array( 'title', 'excerpt', 'author'),
            /*
            * Différentes options supplémentaires
            */
            'show_in_rest' => true,
            'hierarchical'        => false,
            'public'              => true,
            'has_archive'         => true,
            'rewrite'             => array( 'slug' => $this->name),
        ];
    }
}
