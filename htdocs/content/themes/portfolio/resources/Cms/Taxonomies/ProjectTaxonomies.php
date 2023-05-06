<?php

namespace Theme\Cms\Taxonomies;

class ProjectTaxonomies
{
    public function __construct()
    {
        $this->registerClientTaxonomy();
        $this->registerSkillsTaxonomy();
    }

    public function registerSkillsTaxonomy()
    {
        \Taxonomy::make('skills', ['projects'], __('Compétences', THEME_TD), __('Compétence', THEME_TD))
            ->setLabels([
                'add_new_item' => __('Ajouter une compétence', THEME_TD),
                'edit_item' => __('Modifier une compétence', THEME_TD),
                'name' => __('Compétences', THEME_TD),
                'search_items' => __('Rechercher une compétence', THEME_TD),
                'singular_name' => __('Compétence', THEME_TD),
            ])
            ->setArguments([
                'public' => true,
                'supports' => ['title'],
                'menu_icon' => 'dashicons-portfolio',
                'show_in_nav_menus' => true,
                'hierarchical' => false,
            ])
        ->set();
    }

    public function registerClientTaxonomy()
    {
        \Taxonomy::make('clients', ['projects'], __('Clients', THEME_TD), __('Client', THEME_TD))
            ->setLabels([
                'add_new_item' => __('Ajouter un client', THEME_TD),
                'edit_item' => __('Modifier un client', THEME_TD),
                'name' => __('Clients', THEME_TD),
                'search_items' => __('Rechercher un client', THEME_TD),
                'singular_name' => __('Client', THEME_TD),
            ])
            ->setArguments([
                'public' => true,
                'supports' => ['title'],
                'menu_icon' => 'dashicons-portfolio',
                'show_in_nav_menus' => true,
                'hierarchical' => false,
            ])
        ->set();
    }
}