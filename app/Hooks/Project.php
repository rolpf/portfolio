<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;

class Project extends Hookable
{
    public $hook = 'init';
    static $postType = false;
    public function register()
    {
        self::$postType = PostType::make('projects', 'Projets', 'Projet')
        ->setLabels([
            'add_new_item' => __('Ajouter un projet'),
            'edit_item' => __('Modifier un projet'),
            'name' => __('Projets'),
            'search_items' => __('Rechercher un projet'),
            'singular_name' => __('Projet'),
        ])
        ->setArguments([
            'public' => true,
            'supports' => ['title', 'excerpt', 'thumbnail', 'editor'],
            'menu_icon' => 'dashicons-portfolio',
            'show_in_nav_menus' => true,
        ])
        ->set();
    }
}