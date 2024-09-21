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
      screens: {
        tablet: { max: '1024px' },
        'mobile-lg': { max: '768px' },
        'mobile-md': { max: '640px' },
        'mobile-sm': { max: '480px' },
      },
      colors: {
        'dark-blue': '#6482AD',
        'light-blue': '#7FA1C3',
        'white-coffee': '#E2DAD6',
        'light-pink': '#F5EDED',
      },
      fontFamily: {
        montserrat: ['Montserrat', 'sans-serif'],
        'open-sans': ['Open Sans', 'sans-serif'],
      },
      maxWidth: {
        container: '1160px',
      },
    },
  },
  plugins: [],
};
