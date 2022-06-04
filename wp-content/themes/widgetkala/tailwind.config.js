module.exports = {
	content: [
        './*.{js,php,html}',
        './template-parts/*.{js,php,html}',
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
    },
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        customLightgray: '#F8F8F8',
        customLightgray2: '#D8D8D8',
        customDarkWhite: '#DFE0E3',
        customLightblue: '#50A8EA',
        customLightSky: '#9FCFF3',
        customDarkblue: '#2C3246',
        customGray: '#9195A0',
        customLightGray: '#AAADB5',
        customRed: '#EA8550',
        customMediumGray: '#4B4E59',
        customLighterMediumGray: '#595C67',
      },
    },
  },
  plugins: [require('@tailwindcss/line-clamp')],
}
