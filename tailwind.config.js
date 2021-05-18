module.exports = {
    important: true,
    future: {
        removeDeprecatedGapUtilities: true,
    },
    purge: {
        enabled: true,
        content: [
			'./resources/views/**/*.blade.php',
		],
        options: {
            whitelistPatterns: [
                /^bg-.*/,
                /^h-.*/,
                /^w-.*/,
                /^z-.*/,
            ],
            whitelist: [
                'transform',
                '-translate-x-1/2',
                '-translate-y-1/2'
            ]
        },
    },
    theme: {
        extend: {
            width: {
                'full-2x': '200%',
            },
            inset: {
                '1/2': '50%',
                'base': '1rem',
                'base2x': '2rem',
                'base3x': '3rem'
            },
            maxWidth: {
                '1/2': '50%',
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
        container: {
            center: true,
            padding: '1.25rem'
        },
    },
  variants: {
    borderWidth: ['responsive', 'hover', 'focus'],
    backgroundColor: ['responsive', 'hover', 'focus', 'active'],
    borderColor: ['responsive', 'hover', 'focus', 'active'],
    // rotate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    // scale: ['responsive', 'hover', 'focus', 'active', 'group-hover']
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
  corePlugins: {
    backgroundImage: false,
    accessibility: false,
  },
}
