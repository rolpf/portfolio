<?php

namespace Theme\Cms\OptionPage;

use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\WysiwygEditor;
use Extended\ACF\Location;
use Themosis\Support\Facades\Action;

class OptionPage
{
    public function __construct()
    {
        Action::add('acf/init', [$this, 'registerOptionPage']);
        Action::add('acf/init', [$this, 'registerOptionPageFields']);

    }

    public function registerOptionPage() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' => __('Theme Options', THEME_TD),
                'menu_title' => __('Theme Options', THEME_TD),
                'menu_slug' => 'theme-options',
                'capability' => 'edit_posts',
                'redirect' => false,
                'icon_url' => 'dashicons-admin-generic',
                'position' => 2,
            ]);
        }
    }

    public function registerOptionPageFields() {
        if (function_exists('register_extended_field_group')) {
            register_extended_field_group([
               'title' => __('Theme Options', THEME_TD),
               'fields' => [
                   Tab::make(__('Footer', THEME_TD)),
                   WysiwygEditor::make(__('Contenu du footer', THEME_TD), 'footer_content')
               ],
                'location' => [
                    Location::where('options_page', '==', 'theme-options')
                ]
            ]);
        }
    }


}