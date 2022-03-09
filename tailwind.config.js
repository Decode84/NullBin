module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {},
  },
  DarkMode: 'class',
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
