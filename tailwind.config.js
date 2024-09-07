/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: ["./app/Livewire/**/*.php", "./resources/views/**/*.blade.php"],
    theme: {
        extend: {},
    },
    plugins: [require("@tailwindcss/forms")],
};
