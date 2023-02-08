/** @type {import('tailwindcss').Config} */

const componentClassesPlugin = require('tailwind-component-classes');

module.exports = {
  content: ['./src/**/*.{html,js}'],
  theme: {
    fontFamily: {
      heading: 'var(--wp--custom--font--heading)',
      body: 'var(--wp--custom--font--body)',
    },
    fontSize: {
      'heading-1': [
        'var(--wp--custom--font-size--heading-1)',
        'var(--wp--custom--line-height--heading-1)',
      ],
    },
  },
  plugins: [componentClassesPlugin],
  components: {
    heading: {
      h1: `text-heading-1 font-heading tracking-[var(--wp--custom--letter-spacing--heading-1)]`,
    },
  },
};
