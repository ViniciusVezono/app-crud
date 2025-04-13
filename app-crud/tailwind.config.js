/** @type {import('tailwindcss').Config} */
export default {
    content: [
      './resources/**/*.blade.php',     // Todos os arquivos Blade
      './resources/**/*.js',            // Arquivos JS
      './resources/**/*.vue',           // Se estiver usando Vue
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', // Pagination
      './storage/framework/views/*.php' // Views compiladas
    ],
    theme: {
      extend: {
        fontFamily: {
          sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
        },
      },
    },
    plugins: [],
  }
  