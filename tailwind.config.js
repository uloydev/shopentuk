module.exports = {
  // important: true,
  future: {
    removeDeprecatedGapUtilities: true,
  },
  purge: [],
  theme: {
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
      mono: ['Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
      cursive: ['"Annie Use Your Telescope"'],
      roboto: ['Roboto'],
    },
    container: {
      center: true,
      padding: '1.25rem'
    },
  },
  variants: {
    borderWidth: ['responsive', 'hover', 'focus'],
    borderColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
  corePlugins: {
    backgroundImage: false,
    accessibility: false,
  },
}
