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

        \View::composer('pages.projects.singular', function ($view) {
            if (isset($view->project)) {
                $services = wp_get_post_terms($view->project->ID, 'services');
                if(is_array($services)) {
                    $view->with('service', $services[0]);
                }
                $gallery = get_field('gallery', $view->project->ID);
                $view->with('gallery', $gallery);
            }
        });
    }
}