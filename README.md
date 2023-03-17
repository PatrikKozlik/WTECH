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

4. In pulled folder use command - every time, when you want to work on project, you need to use this command

<code>npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch</code>

# Additional packages and extends needed for all features
1. Spacing extended

<code>extend: {
      spacing:{
        '128': '32rem',
        '144': '36rem',
      },
      margin: {
        '17.5': '17.5%',
      }
    },</code>

2. Line-clamp

Install: <code>npm install @tailwindcss/line-clamp</code>

Use: <code>plugins: [
    require('@tailwindcss/line-clamp'),
  ],</code>