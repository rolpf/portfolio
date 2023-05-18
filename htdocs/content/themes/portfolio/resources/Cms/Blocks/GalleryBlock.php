<?php

namespace Theme\Cms\Blocks;

use AmphiBee\AcfBlocks\Block;
use Extended\ACF\Fields\Gallery;

class GalleryBlock
{
    public function __construct()
    {
        Block::make(__('Galerie photo', THEME_TD))
            ->setFields([
                Gallery::make(__('Galerie photo', THEME_TD), 'gallery')
            ])
            ->loadAllFields()
            ->setView('blocks.gallery');
    }
}