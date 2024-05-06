/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'sans': ['Montserrat'],
    },
    extend: {
      colors: {
        "footer-bg": "#02213d",
        "telecharger-bg": "#0079fe",
        "reclamer-bg": "#007afe",
        "left": "#3473b3",
        "right": "#3693f4",
        "bg-two": "#f8f9fb",
      },
    },
  },
  plugins: [],
}