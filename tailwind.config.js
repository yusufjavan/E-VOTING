import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          dark: '#0A1F44', // dark blue (hero background start)
          light: '#4A90E2', // lighter blue (hero gradient end)
        },
        accent: {
          lime: '#A4C639', // lime green accent
        },
        background: {
          slate: '#F0F4F8', // bluish‑gray background
        },
      },
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        serif: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
      },
      borderRadius: {
        lg: '0.5rem', // UI cards, buttons
        xl: '0.75rem', // larger containers, modals
      },
      boxShadow: {
        card: '0 4px 6px rgba(0,0,0,0.1)', // subtle elevation for cards
      },
    },
  },
  plugins: [forms],
};