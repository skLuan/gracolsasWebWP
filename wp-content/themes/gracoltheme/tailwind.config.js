/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    fontFamily: {
      futura: ["Futura-Bk-BT"],
      futuraBold: ["Futura-Hv-BT"],
    },
    extend: {
      maxWidth: {
        'max-w-screen-2xl': '1440px'
      },
      colors: {
        orangeG: {
          DEFAULT: "#FF7101",
        },
        greenG: {
          DEFAULT: "#556654",
          light: "#87AD85",
          mid: "#1F2E1F",
        },
        whiteG: {
          DEFAULT: "#F2F4F2",
        },
        grayG: {
          DEFAULT: "#8B8B8B",
        },
        yellowG: {
          DEFAULT: "#F2A94A",
        },
      },
    },
  },
  plugins: [],
};

