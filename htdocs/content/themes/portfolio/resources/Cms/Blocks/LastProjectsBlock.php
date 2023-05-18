<?php

namespace Theme\Cms\Blocks;

use AmphiBee\AcfBlocks\Block;
use Extended\ACF\Fields\Message;

class LastProjectsBlock
{
    public function __construct()
    {
        Block::make(__('Remontée des derniers projets', THEME_TD), 'last_projects_block')
            ->setFields([
                Message::make(__('Remontée des derniers projets', THEME_TD), 'last_projects_block_message')
                    ->message(__('Remontée des derniers projets', THEME_TD))
            ])
            ->setView('blocks.last-projects');

    }
}