wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/heading',
        {
            name: 'bubble-yellow',
            label: 'Bulle Jaune',
        });

    wp.blocks.registerBlockStyle('core/heading', {
            name: 'bubble-yellow-small',
            label: 'Bulle Jaune Petite',
        });
});
