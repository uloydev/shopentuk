module.exports = {
    important: true,
    future: {
        removeDeprecatedGapUtilities: true,
    },
    purge: [],
    theme: {
        extend: {
            width: {
                'full-2x': '200%',
            },
            inset: {
                '1/2': '50%'
            },
            maxWidth: {
                '1/2': '50%'
            },
            backgroundColor: {
                'parent': 'inherit'
            },
            textColor: {
                'parent': 'inherit'
            },
            maxHeight: {
                '0': '0',
                'none': 'none',
                'screen': '100vh',
            }
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
