<?php

namespace Theme\Providers;

class ViewServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        \View::composer('blocks.last-projects', function ($view) {
            $query = new \WP_Query([
                'post_type' => 'projects',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            ]);

            $view->with('projects', $query->posts);
        });
    }
}