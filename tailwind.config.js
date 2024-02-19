import defaultTheme from 'tailwindcss/defaultTheme';
import preset from './vendor/filament/support/tailwind.config.preset'
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './resources/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './node_modules/flowbite/**/*.js',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],
    darkMode: 'class',
    theme: {
        safelist: [
            'animate-[fade-in_1s_ease-in-out]',
            'animate-[fade-out_1s_ease-in-out]',
            'animate-[fade-in-down_1s_ease-in-out]',
            'animate-[fly-in-right_0.5s]',
            'animate-[zoomIn_0.5s]',
            'animate-[fly-in-left_0.5s]',
            'animate-[fade-in_0.5s_ease-in-out]'
                ],
        extend: {
            keyframes: {
                lights: {
                    '0%': {
                      color: 'hsl(230, 40%, 80%)',
                      dropShadow : '0 0 1em hsla(320, 100%, 50%, 0.2), 0 0 0.125em hsla(320, 100%, 60%, 0.3), -1em -0.125em 0.5em hsla(40, 100%, 60%, 0), 1em 0.125em 0.5em hsla(200, 100%, 60%, 0)',
                    },
                    '30%': {
                      color: 'hsl(230, 80%, 90%)',
                      dropShadow: '0 0 1em hsla(320, 100%, 50%, 0.5), 0 0 0.125em hsla(320, 100%, 60%, 0.5), -0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2), 0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4)',
                    },
                    '40%': {
                      color: 'hsl(230, 100%, 95%)',
                      dropShadow: '0 0 1em hsla(320, 100%, 50%, 0.5), 0 0 0.125em hsla(320, 100%, 90%, 0.5), -0.25em -0.125em 0.125em hsla(40, 100%, 60%, 0.2),0.25em 0.125em 0.125em hsla(200, 100%, 60%, 0.4)',
                    },
                    '70%': {
                      color: 'hsl(230, 80%, 90%)',
                      dropShadow: '0 0 1em hsla(320, 100%, 50%, 0.5), 0 0 0.125em hsla(320, 100%, 60%, 0.5), 0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),-0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4)',
                    },
                    '100%': {
                      color: 'hsl(230, 40%, 80%)',
                      dropShadow: '0 0 1em hsla(320, 100%, 50%, 0.2),0 0 0.125em hsla(320, 100%, 60%, 0.3),1em -0.125em 0.5em hsla(40, 100%, 60%, 0),-1em 0.125em 0.5em hsla(200, 100%, 60%, 0)'
                    },
                    }
                  },
            animation: {
                lights: 'lights 5s 750ms linear infinite',
                  },
            colors: {
                    danger: colors.rose,
                    primary: colors.blue,
                    success: colors.green,
                    warning: colors.yellow,
                    primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
              },
              fontFamily: {
                'body': [
              'Roboto',
              'Inter',
              'ui-sans-serif',
              'system-ui',
              '-apple-system',
              'system-ui',
              'Segoe UI',
              'Helvetica Neue',
              'Arial',
              'Noto Sans',
              'sans-serif',
              'Apple Color Emoji',
              'Segoe UI Emoji',
              'Segoe UI Symbol',
              'Noto Color Emoji'
            ],
                'sans': [
                    'Roboto',
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ],
            },
        },
    },

    plugins: [
        forms,
        typography,
        require('flowbite/plugin'),
        require('./node_modules/tw-elements/dist/plugin.cjs'),
        require('tailwindcss-intersect'),
    ],

};
