<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;

class Projet extends Hookable
{
    public $hook = 'init';
    static $postType = false;
    public function register()
    {
        self::$postType = PostType::make('projets', 'Projets', 'Projet')
        ->setLabels([
            'add_new_item' => __('Ajouter un projet'),
            'edit_item' => __('Modifier un projet'),
            'name' => __('Projets'),
            'search_items' => __('Rechercher un projet'),
            'singular_name' => __('Projet'),
        ])
        ->setArguments([
            'public' => true,
            'supports' => ['title', 'excerpt','thumbnail'],
            'menu_icon' => 'dashicons-portfolio',
            'show_in_nav_menus' => true,
        ])
        ->set();
    }
}