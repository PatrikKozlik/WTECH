# Prerequisites
## Installed nodejs and npm

# Tailwind setup 

<b>WARNING -> You cant execute any command in src or dist, use them inside of folder, where are they saved<b>
<br>
<br>

1. Pull project

2. In pulled folder use:

<code>npm install -D tailwindcss</code>
<code>npx tailwindcss init</code>

3.  File tailwind.config.js should look like this

<code>module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}</code>

4. In pulled folder use command 

<code>npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch</code>