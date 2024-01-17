/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
colors:{
    'lvo hoofdkleur':'#519238',
    'lvo-pink': '#CF8DCD',
    'lvo-purple': '#db3397',
    'lvo-light-blue': '#83cac6',
    'lvo-blue': '#00a9dc',
    'lvo-green':'#76bc21',
    'lvo-light-green': '#94d02d',
    'lvo-yellow': '#ffc884',
    'lvo-orange': '#f87728'
}
    },
  },
    plugins: [
        require('@tailwindcss/typography'),
        // ... other plugins
    ],
}

