/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        belanosima: ["Belanosima", "sans-serif"],
      },
      keyframes: {
        upDown: {
          "0% , 50% , 100%": { transform: "translateY(0)" },
          "25%": { transform: "translateY(-20px)" },
          "75%": { transform: "translateY(20px)" },
        },
      },
      animation: {
        upDown: "upDown 4s linear infinite",
      },
    },
  },
  plugins: [],
}

