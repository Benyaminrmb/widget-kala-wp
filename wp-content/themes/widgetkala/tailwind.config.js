module.exports = {
    content: [
        './*.{js,php,html}',
        './template-parts/*.php',
        './template-parts/*/*.php',
        './woocommerce/checkout/*.php',
        './woocommerce/single-product/tabs/*.php',
        './woocommerce/loop/orderby.php',
        './woocommerce/loop/pagination.php',
        './woocommerce/loop/loop-start.php',
        './woocommerce/loop/result-count.php',
        './woocommerce/content-product.php',
        './woocommerce/taxonomy-product-brand.php',
        './woocommerce/taxonomy-product-cat.php',
        './woocommerce/taxonomy-product-tag.php',
        './woocommerce/single-product/tabs/tabs.php'
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
            none: 'none',
            space: '',
        },
        extend: {
            // gridTemplateColumns: {
            //     '16': 'repeat(16, minmax(0, 1fr))',
            //     '18' : 'repeat(18, minmax(0, 1fr))',
            //     '24': 'repeat(24,minmax(0,1fr))'
            // },
            // gridColumn: {
            //     'span-13': 'span 13 / span 13',
            //     'span-14': 'span 14 / span 14',
            //     'span-15': 'span 15 / span 15',
            //     'span-16': 'span 16 / span 16',
            //     'span-17': 'span 17 / span 17',
            //     'span-18': 'span 18 / span 18',
            //     'span-19': 'span 19 / span 19',
            //     'span-20': 'span 20 / span 20',
            //     'span-21': 'span 21 / span 21',
            //     'span-22': 'span 22 / span 22',
            //     'span-23': 'span 23 / span 23',
            //     'span-24': 'span 24 / span 24',
            // },
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
            borderRadius: {
                'five': '5px'
            },
            fontSize: {
                xs: ['10px', '16px'],
                sm: ['12px', '19px'],
                base_17: ['17px'],
                base_16: ['16px'],
                base_14: ['14px'],
                base: ['14px', '26px'],
                rem: ['1rem', '1.7rem'],
                lg: ['18px', '28px'],
                xl: ['22px', '32px'],
                xxl: ['24px', '36px'],
            },
            lineHeight: {

                '25': '25px',
            },
            margin: {
                '14px': '14px',
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                customLightgray: '#F8F8F8',
                customLightgray2: '#D8D8D8',
                customLightgray3: '#F4F4F5',
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
