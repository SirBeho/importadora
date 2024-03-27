/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.{html,js,php}","./*.{html,js,php}","./node_modules/flowbite/**/*.js","./src/**/*.{html,js}","*.{html,js}"],
  darkMode: 'class',
  theme: {
    extend: {
      screens: {
        'sx': '520px',
        'ssx': '430px',
      },
      maxWidth: {
        'sx': '520px',
        'ssx': '430px',
      },
      height: {
        '18' : '4.5rem',
        '100c' : 'calc(100% - 1rem)',
        
      },
      width: {
        '18' : '4.5rem',
      },
      colors: {
        'gray-sl': '#353a40',
        'gray-33': '#333',

      },
    }
  },
  plugins: [],
};

// npx tailwindcss -i ./css/input.css -o ./css/output.css --watch