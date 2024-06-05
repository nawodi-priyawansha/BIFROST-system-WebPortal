/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        "littlegreen":"#31C7A2",
        'lightyellow':"#FAF9F0",
      }
    },
  },
  plugins: [],
}

