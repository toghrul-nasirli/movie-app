module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false,
  theme: {
    extend: {},
    spinner: (theme) => ({
      default: {
        color: '#dae1e7',
        size: '1em',
        border: '2px',
        speed: '500ms',
      },
    }),
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('tailwindcss-spinner')({ className: 'spinner', themeKey: 'spinner' }),
  ],
}
