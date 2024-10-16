/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/views/**/*.js",
  ],
  theme: {
    fontFamily:{
      'sans': ['Inter', 'sans-serif'],
    },
    extend: {
      colors: {
        abu: 'F7F7F9',
        indigo: {
          DEFAULT: '#666CFF',
          100: '#D9DBFF',
          200: '#B4B7FF',
          300: '#8F92FF',
          400: '#6A6DFF',
          500: '#666CFF', // Primary color
          600: '#5356CC',
          700: '#404199',
          800: '#2D2D66',
          900: '#1A1933',
        },
        lavender: {
          DEFAULT: '#9A9DFF',
          100: '#E5E6FF',
          200: '#CCCCFF',
          300: '#B3B3FF',
          400: '#9A9DFF', // Primary color
          500: '#8285FF',
          600: '#6A6DCC',
          700: '#525399',
          800: '#393966',
          900: '#211F33',
        },
        pink: {
          DEFAULT: '#F8004C',
          100: '#FDD6E1',
          200: '#FBACC3',
          300: '#F883A5',
          400: '#F55987',
          500: '#F8004C', // Primary color
          600: '#C7003D',
          700: '#95002E',
          800: '#64001F',
          900: '#320010',
        },
        coral: {
          DEFAULT: '#FF6464',
          100: '#FFD9D9',
          200: '#FFB3B3',
          300: '#FF8C8C',
          400: '#FF6666',
          500: '#FF6464', // Primary color
          600: '#CC5151',
          700: '#993D3D',
          800: '#662A2A',
          900: '#331515',
        },
        gold: {
          DEFAULT: '#FDB528',
          100: '#FFEDD1',
          200: '#FFE2A3',
          300: '#FFD675',
          400: '#FDBA3C',
          500: '#FDB528', // Primary color
          600: '#C99220',
          700: '#967018',
          800: '#644D10',
          900: '#322908',
        },
        bright: {
          DEFAULT: '#F8EE00',
          100: '#FFFAD6',
          200: '#FFF5AC',
          300: '#FFF082',
          400: '#FFEB59',
          500: '#F8EE00', // Primary color
          600: '#C6BB00',
          700: '#948900',
          800: '#625600',
          900: '#312B00',
        },
        pale: {
          DEFAULT: '#FFFBA5',
          100: '#FFFFE5',
          200: '#FFFEC9',
          300: '#FFFBA5', // Primary color
          400: '#FFF785',
          500: '#FFF366',
          600: '#CCC94E',
          700: '#999137',
          800: '#666122',
          900: '#33310E',
        },
        lime: {
          DEFAULT: '#72E128',
          100: '#E5FFD4',
          200: '#CCFFA9',
          300: '#B3FF7D',
          400: '#99FF52',
          500: '#72E128', // Primary color
          600: '#59B020',
          700: '#407D18',
          800: '#2A5210',
          900: '#152908',
        },
        mint: {
          DEFAULT: '#B9FA8E',
          100: '#F0FFE4',
          200: '#E2FFC9',
          300: '#D4FFAE',
          400: '#C6FF94',
          500: '#B9FA8E', // Primary color
          600: '#8FBD6C',
          700: '#678F4C',
          800: '#3F6131',
          900: '#1F3117',
        },
        light: {
          DEFAULT: '#E8FF8B',
          100: '#FCFFDA',
          200: '#F9FFB5',
          300: '#F3FF91',
          400: '#ECFF6D',
          500: '#E8FF8B', // Primary color
          600: '#B9CC66',
          700: '#8A9950',
          800: '#5A6637',
          900: '#2C3320',
        },
      },
    },
  },
  plugins: [],
}


