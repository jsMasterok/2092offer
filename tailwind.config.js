/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.html", "./src/*.css"],
  theme: {
    extend: {
      colors: {
        primary: "#015782",
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
