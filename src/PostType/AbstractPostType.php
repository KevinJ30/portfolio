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

    public function __construct(string $name, string $singularName, string $menuName)
    {
        $this->name = $name;
        $this->singularName = $singularName;
        $this->menuName = $menuName;

        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        register_post_type('news', $this->arguments());
    }

    public function label() : array
    {
        return [
            'name'                => _x($this->name, 'Post Type General Name'),
            'singular_name'       => _x($this->singularName, 'Post Type Singular Name'),
            'menu_name'           => __($this->name),
            'all_items'           => __('Toutes les' . $this->name),
            'view_item'           => __('Voir les' . $this->name),
            'add_new_item'        => __('Ajouter une nouvelle' . $this->singularName),
            'add_new'             => __('Ajouter'),
            'edit_item'           => __('Editer la' . $this->singularName),
            'update_item'         => __('Modifier la' . $this->singularName),
            'search_items'        => __('Rechercher une' . $this->singularName),
            'not_found'           => __('Non trouvée'),
            'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
        ];
    }

    abstract protected function arguments();
}
