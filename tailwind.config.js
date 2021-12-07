const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Studio Sans DEMO', ...defaultTheme.fontFamily.sans],
      },
    },
    screens: {
      // Extra Big Large Devices (Large Desktops, 1536px to .....)
      // Extra Large Devices (Desktops, 1280px to 1536px)
      // Large Devices (Laptops, 1024px to 1280px)
      // Medium Devices (Tablets, 768px to 1024px)
      // Small Devices (Landscape Phones, 640px to 768px)
      // Extra Small Devices (Portrait Phones, Less than 640px)
      
      // Min-Width
      '2xl': '1536px',
      'xl': '1280px',
      'lg': '1024px',
      'md': '768px',
      'sm': '640px',
      'xs': {'max': '639.98px'},
  
      // Max-Width
      /*'xl': {'max': '1535.98px'},
      'lg': {'max': '1279.98px'},
      'md': {'max': '1023.98px'},
      'sm': {'max': '767.98px'},
      'xs': {'max': '639.98px'},*/
      
      /*'2xl': {'min': '1536px'},
      'xl': {'min': '1280px', 'max': '1535.98px'},
      'lg': {'min': '1024px', 'max': '1279.98px'},
      'md': {'min': '768px', 'max': '1023.98px'},
      'sm': {'min': '640px', 'max': '767.98px'},
      'xs': {'max': '639.98px'},*/
      
    }
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [require('@tailwindcss/forms')],

};
