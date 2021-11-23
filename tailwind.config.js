const colors = require('tailwindcss/colors')

module.exports = {
  important: true,
  purge: {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue'
    ],
    options: {
      safelist: [
        /.*bg-(nt-blue|blue|gray|red|yellow|green).*/, // Buttons
        ...['green', 'red', 'blue', 'yellow'].map((color) => ['bg-' + color + '-100', 'border-' + color + '-500']).flat() // Alerts
      ]
    }
  },
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      maxHeight: {
        42: '10.5rem'
      },
      minHeight: {
        6: '1.5rem',
        8: '2rem'
      },
      maxWidth: {
        15: '15rem',
        10: '10rem',
        8: '2rem'
      },
      colors: {
        gray: colors.blueGray,
        'nt-blue': {
          lighter: colors.blue['100'],
          light: colors.blue['300'],
          default: colors.blue['500'],
          DEFAULT: colors.blue['500'],
          dark: colors.blue['800']
        },
        'notion-dark': {
          DEFAULT: '#2F3437',
          light: '#454B4E'
        }
      },
      transitionProperty: {
        height: 'height',
        width: 'width',
        spacing: 'margin, padding'
      }
    }
  },
  variants: {
    extend: {
      animation: ['hover'],
      brightness: ['hover', 'focus'],
      invert: ['dark'],
      maxWidth: ['hover'],
      display: ['group-hover']
    }
  },
  plugins: []
}
