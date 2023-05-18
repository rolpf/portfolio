<?php

namespace Theme\Cms\Blocks;

use AmphiBee\AcfBlocks\Block;
use Extended\ACF\Fields\Relationship;
use Extended\ACF\Fields\Taxonomy;
use Extended\ACF\Fields\TrueFalse;

class ServiceBlock
{
    public function __construct()
    {
        Block::make(__('Présentation d\'un service'))
            ->setFields([
                TrueFalse::make(__('Projets à droite', THEME_TD), 'projects_right')
                    ->stylisedUi()
                    ->defaultValue(true),
                Taxonomy::make(__('Service', THEME_TD), 'service')
                    ->taxonomy('services')
                    ->appearance('multi_select'),
                Relationship::make(__('Projects', THEME_TD), 'projects')
                    ->postTypes(['projects'])
                    ->min(1)
                    ->filters([
                        'taxonomy'
                    ])
            ])
            ->loadAllFields()
            ->enableJsx()
            ->setView('blocks.service');
    }
}