<?php

namespace Theme\Cms\Fields;

use Extended\ACF\Fields\Gallery;
use Extended\ACF\Location;

class ProjectFields
{
    public function __construct()
    {
        if (function_exists('register_extended_field_group')) {
            register_extended_field_group([
                'title' => 'Project',
                'fields' => [
                    Gallery::make('Galerie photo', 'gallery'),
                ],
                'location' => [
                    Location::where('post_type', '=', 'projects')
                ]
            ]);
        }
    }
}