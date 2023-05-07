const defaultTheme = require('tailwindcss/defaultTheme')

const fs = require('fs');
const themeJson = fs.readFileSync('./theme.json');
const theme = JSON.parse(themeJson);
const themeColors = theme.settings.color.palette.reduce((acc, item) => {
    const [color, number] = item.slug.split('-');
    let colorVariants = [];
    if (typeof item.variants !== 'undefined' && item.variants === true) {
        colorVariants = tailwindColorPalette(item.color, {'name': color});
    } else {
        colorVariants[color] = item.color;
    }
    if (undefined !== number) {
        if (!acc[color]) {
            acc[color] = {};
        }
        acc[color][number] = colorVariants[color];
    } else {
        acc[color] = colorVariants[color];
    }

    return acc;
}, {});


/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './assets/**/*.{css,js}',
        './views/**/*.blade.php',
        '../../../../resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: themeColors,
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp')
    ],
}
