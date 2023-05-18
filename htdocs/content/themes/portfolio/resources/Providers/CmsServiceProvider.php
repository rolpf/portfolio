<?php

namespace Theme\Providers;

use Theme\Cms\Blocks\LastProjectsBlock;
use Theme\Cms\Blocks\ServiceBlock;
use Theme\Cms\Fields\ProjectFields;
use Theme\Cms\Fields\ServiceFields;
use Theme\Cms\OptionPage\OptionPage;
use Theme\Cms\Taxonomies\ProjectTaxonomies;

class CmsServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Fields
        \Action::add('acf/init', function () {
            new ProjectFields();
            new ServiceFields();
        });

        // Taxonomies
        new ProjectTaxonomies();

        // Option page
        new OptionPage();

        // Blocks
        new LastProjectsBlock();
        new ServiceBlock();

    }
}