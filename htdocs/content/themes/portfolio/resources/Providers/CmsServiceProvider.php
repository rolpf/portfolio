<?php

namespace Theme\Providers;

use Theme\Cms\Fields\ProjectFields;
use Theme\Cms\Taxonomies\ProjectTaxonomies;

class CmsServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Fields
        \Action::add('acf/init', function () {
            new ProjectFields();
        });

        // Taxonomies
        new ProjectTaxonomies();
    }
}