/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#0045F6",
                secondary: "#F9F7F5",
                blue: "#00CFFF",
                lightBlue: "#D7E8F4",
                lighterBlue: "#F4F8FC",
                semiBlue: "#00CFFF",
                tagBlue: "#D1F2FA"
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
