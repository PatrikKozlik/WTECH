# Prerequisites
## Installed nodejs and npm

# Tailwind setup 

1. Pull project

2. In pulled folder use:

npm install -D tailwindcss
npx tailwindcss init

3.  File tailwind.config.js should look like this

module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}

4. use command 

npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch


WARNING -> You cant execute any command in src or dist, use them inside of folder, where are they saved 