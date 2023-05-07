<?php

namespace Theme\Providers;

use Livewire\Livewire;

class LivewireServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        Livewire::component('project-archive', \Theme\Livewire\ProjectArchive::class);
    }
}