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
        self::$postType = PostType::make('projets', 'Projets', 'Projet')->set();
    }
}
