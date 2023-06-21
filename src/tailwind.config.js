/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#013880",
                secondary: "#f1c40f",
            },
        },
    },
    plugins: [],
};
