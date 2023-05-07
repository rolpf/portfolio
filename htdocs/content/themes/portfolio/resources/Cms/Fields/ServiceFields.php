<?php

namespace Theme\Cms\Fields;

use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Location;

class ServiceFields
{
    public function __construct()
    {
        if (function_exists('register_extended_field_group')) {
            register_extended_field_group([
                'title' => 'Service',
                'fields' => [
                    ColorPicker::make('Couleur', 'color'),
                ],
                'location' => [
                    Location::where('taxonomy', '==', 'services')
                ]
            ]);
        }
    }
}