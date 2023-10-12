/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/*.php",
    "./app/Views/**/*.php",
    "./app/Views/**/**/*.php",
    "./app/Views/**/**/**/*.php",
    "./app/Views/**/**/**/**/*.php",
    "./app/Views/*.js",
    "./app/Views/**/*.js",
    "./vendor/myth/auth/src/Views/_message_block.php",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: {
          50: "#0d5d97cb",
          100: "#209ef9",
          200: "#1d97ee",
          300: "#1782ce",
          400: "#1576bb",
          500: "#126baa",
          600: "#571deb",
          700: "#6426ff",
          800: "#0b4e7e",
          900: "#093f65",
        },
        background: {
          600: "#F5F5F9",
        },
        bgForm: "#eaf5fc",
        bgForm2: "#E8F0FE",
        bgFormSoft: "#EDF2F7",
        bgHeader: "#DADDFD",
        bgFooter: "#4d19d2",
        bgFooterHover: "#571deb",
        bgContent: "#FBFDFF",
        bgCard: "#eaecfd",
        bgCardDark: "#6426ff",
      },
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        publicSans: ["PublicSans", "sans-serif"],
      },
    },
    plugins: [require("tw-elements/dist/plugin")],
  },
};
