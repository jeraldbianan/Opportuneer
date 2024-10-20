import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", ...defaultTheme.fontFamily.sans],
                "open-sans": ["Open Sans", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "dark-blue": "#6482AD",
                "light-blue": "#7FA1C3",
                "white-coffee": "#E2DAD6",
                "light-pink": "#F5EDED",
                "main-gray": "#F7F7F7",
                danger: "#D15151",
                success: "#25CC72",
            },
            maxWidth: {
                container: "1160px",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
