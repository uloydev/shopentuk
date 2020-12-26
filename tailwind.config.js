module.exports = {
    important: true,
    future: {
        removeDeprecatedGapUtilities: true,
    },
    purge: [],
    theme: {
        extends: {
            'full-2x': '200%'
        },
        container: {
            center: true,
            padding: '1.25rem'
        },
        fontFamily: {
            sans: [
                'system-ui',
                '-apple-system',
                'BlinkMacSystemFont',
                '"Segoe UI"',
                'Roboto',
                '"Helvetica Neue"',
                'Arial',
                '"Noto Sans"',
                'sans-serif',
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"',
                'Nunito'
            ],
            serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
            mono: [
                'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'
            ],
            cursive: ['"Annie Use Your Telescope"'],
            roboto: ['Roboto'],
        },
    },
  variants: {
    borderWidth: ['responsive', 'hover', 'focus'],
    backgroundColor: ['responsive', 'hover', 'focus', 'active'],
    borderColor: ['responsive', 'hover', 'focus', 'active'],
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
  corePlugins: {
    backgroundImage: false,
    accessibility: false,
  },
}
