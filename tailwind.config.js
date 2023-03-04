/** @type {import('tailwindcss').Config} */
const theme = require("tailwindcss/defaultTheme");

module.exports = {
  darkMode: "class",
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: (theme) => ({
        "nfsu-dark": "url('/storage/static/bg-dark.webp')",
        "nfsu-light": "url('/storage/static/bg-light.jpg')",
      }),
    },
  },
  plugins: [],
};
