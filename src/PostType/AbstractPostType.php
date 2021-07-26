<?php

namespace KevinJ30\PostType;

abstract class AbstractPostType
{

    /**
     * @var string $name Plural name
     **/
    protected string $name;

    /**
     * @var string $singularName Singular name
     **/
    protected string $singularName;

    /**
     * @var string $menuName Name in the menu
     **/
    protected string $menuName;

    /**
     * @var string $menuIcon Icon in the menu
     **/
    protected string $menuIcon;

    /**
     * @var array $supports All the data supports for the post type
     **/
    protected array $supports;

    public function __construct(string $name, string $singularName, string $menuName, string $menuIcon = "dashicons-admin-post", array $supports = ['title', 'excerpt', 'author'])
    {
        $this->name = $name;
        $this->singularName = $singularName;
        $this->menuName = $menuName;
        $this->menuIcon = $menuIcon;
        $this->supports = $supports;

        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        register_post_type($this->singularName, $this->arguments());
    }

    protected function label() : array
    {
        return [
            'name'                => _x($this->name, 'Post Type General Name'),
            'singular_name'       => _x($this->singularName, 'Post Type Singular Name'),
            'menu_name'           => __($this->name),
            'all_items'           => __('Toutes les ' . $this->name),
            'view_item'           => __('Voir les ' . $this->name),
            'add_new_item'        => __('Ajouter une nouvelle ' . $this->singularName),
            'add_new'             => __('Ajouter'),
            'edit_item'           => __('Editer la ' . $this->singularName),
            'update_item'         => __('Modifier la ' . $this->singularName),
            'search_items'        => __('Rechercher une' . $this->singularName),
            'not_found'           => __('Non trouvée'),
            'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
        ];
    }

    protected function arguments() : array
    {
        return [
            'label'               => __($this->name),
            'description'         => __('Tous sur la ' . $this->name),
            'labels'              => $this->label(),
            // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
            'supports'            => $this->supports,
            /*
            * Différentes options supplémentaires
            */
            'show_in_rest' => true,
            'hierarchical'        => false,
            'public'              => true,
            'has_archive'         => true,
            'rewrite'             => array( 'slug' => $this->name),
            'menu_icon'           => $this->menuIcon,
            'rest_base'           => $this->name
        ];
    }
}
