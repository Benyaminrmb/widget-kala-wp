module.exports = {
    content: [
        './*.{js,php,html}',
        './template-parts/*.php',
        './template-parts/*/*.php',
        './woocommerce/checkout/*.php',
        './woocommerce/loop/orderby.php',
        './woocommerce/loop/pagination.php',
        './woocommerce/loop/loop-start.php',
        './woocommerce/loop/result-count.php',
        './woocommerce/content-product.php',
        './woocommerce/taxonomy-product-brand.php',
        './woocommerce/taxonomy-product-cat.php',
        './woocommerce/taxonomy-product-tag.php',

    ],
    theme: {
        screens: {
            xs: '475px',
            sm: '576px',
            md: '960px',
            lg: '1324px',
        },
        content: {
            lines: 'url("../images/lines.svg")',
            horizontalLines: 'url("../images/horizontal_lines.svg")',
            darkHorizontalLines: 'url("../images/dark_horizontal_lines.svg")',
            logo: 'url("../images/logo.svg")',
        },
        extend: {
            zIndex: {
                '999': '999',
                '998': '998',
                '1': '1',
                '2': '2',
                '3': '3'
            },
            backgroundImage: {
                'logo-image': 'url("../images/logo.svg")',
            },
            fontSize: {
                xs: ['10px', '16px'],
                sm: ['12px', '19px'],
                base: ['14px', '26px'],
                lg: ['18px', '28px'],
                xl: ['24px', '36px'],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                customLightgray: '#F8F8F8',
                customLightgray2: '#D8D8D8',
                customLightgraytwo: '#D8D8D8',
                customDarkWhite: '#DFE0E3',
                customLightblue: '#50A8EA',
                customLightSky: '#9FCFF3',
                customDarkblue: '#2C3246',
                customGray: '#9195A0',
                customLightGray: '#AAADB5',
                customRed: '#EA8550',
                customBlack: '#707070',
                customMediumGray: '#4B4E59',
                customLighterMediumGray: '#595C67',
            },
        },
    },
    plugins: [require('@tailwindcss/line-clamp')],
}
