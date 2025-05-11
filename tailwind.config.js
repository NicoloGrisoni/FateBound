/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js,php}"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        'custom-purple-accent': '#6E41E2', // Viola principale per bottoni e accenti (valore esatto da campionare dall'immagine se possibile, questo è un esempio)
        'custom-bg-start': '#F7F5FF', // Inizio gradiente hero section (bianco-lavanda molto chiaro)
        'custom-bg-end': '#FFFFFF',    // Fine gradiente hero section (bianco)
      },
      fontFamily: {
        'body': ['Poppins', 'sans-serif'], 
        'heading': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
