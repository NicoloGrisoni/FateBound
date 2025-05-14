/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js,php}"],
  darkMode: "class",
  theme: {
    extend: {
        colors: {
            primary: '#a0a0e0',
            'primary-dark': '#8080c0',
            'primary-light': '#b0b0f0',
            dark: {
                bg: '#121212',
                card: '#1E1E1E',
                border: '#333333',
                text: '#FFFFFF',
                'text-secondary': '#AAAAAA'
            },
            light: {
                bg: '#FFFFFF',
                card: '#FFFFFF',
                border: '#EEEEEE',
                text: '#000000',
                'text-secondary': '#555555'
            }
        },
        fontFamily: {
            sans: ['Inter', 'sans-serif']
        },
        boxShadow: {
            'light': '0 2px 10px rgba(0, 0, 0, 0.05)',
            'dark': '0 2px 10px rgba(0, 0, 0, 0.2)'
        },
        borderRadius: {
            'card': '12px',
            'button': '8px',
            'input': '8px'
        }
    }
},
  plugins: [],
};
