/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.html',
    './src/**/*.{vue,js,ts,jsx,tsx}',
    './node_modules/quasar/src/**/*.{js,ts,vue}',
    './node_modules/quasar/src/**/*.sass',
  ],
  theme: {
    extend: {
      colors: {
        'dark-blue': '#6482AD',
        'light-blue': '#7FA1C3',
        'white-coffee': '#E2DAD6',
        'light-pink': '#F5EDED'
      }
    },
  },
  plugins: [],
};
