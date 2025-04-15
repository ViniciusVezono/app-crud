/** @type {import('tailwindcss').Config} */
export default {
    content: [
      './resources/**/*.blade.php',     // Todos os arquivos Blade
      './resources/**/*.js',            // Arquivos JS
      './resources/**/*.vue',           // Se estiver usando Vue
      './storage/framework/views/*.php' // Views compiladas
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  