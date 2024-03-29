const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./src/js/**/*.js', './inc/acf/lightning-builder/page-components/**/*.php', './**/*.php'],
    // darkMode: 'class',
    corePlugins: {
        container: false,
    },
    safelist: [
        {
            pattern: /grid-cols-(1|2|3|4|5|6|7|8)/,
            variants: ['md', 'lg', 'xl', 'xxl'],
        },
    ],

    theme: {
        screens: {
            xs: '374px',
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            xxl: '1536px',
        },

        fontFamily: {
            manrope: ['Manrope', 'sans-serif'],
            material: ['"Material Icons Round"', 'sans-serif'],
        },

        colors: {
            transparent: 'transparent',
            white: '#ffffff',
            black: {
                DEFAULT: '#1A1A1A',
                950: '#000000',
            },
            gray: {
                50: '#f9fafb',
                100: '#f3f4f6',
                200: '#e5e7eb',
                300: '#d1d5db',
                400: '#9ca3af',
                500: '#6b7280',
                600: '#4b5563',
                700: '#374151',
                800: '#1f2937',
                900: '#111827',
            },
            primary: {
                50: '#F0E0FF',
                100: '#D6ADFF',
                200: '#BC7AFF',
                300: '#A347FF',
                400: '#8914FF',
                500: '#7000E0',
                600: '#5600AD',
                700: '#3D007A',
                800: '#230047',
                900: '#0A0014',
            },
            pink: {
                50: '#fdf2f8',
                100: '#fce7f3',
                200: '#fbcfe8',
                300: '#f9a8d4',
                400: '#f472b6',
                500: '#ec4899',
                600: '#db2777',
                700: '#be185d',
                800: '#9d174d',
                900: '#831843',
                950: '#500724',
            },

            cta: {
                DEFAULT: 'hsl(var(--color-primary) / <alpha-value>)',
                hover: 'hsl(var(--color-primary-hover) / <alpha-value>)',
                active: 'hsl(var(--color-primary-active) / <alpha-value>)',
            },

            background: {
                transparent: 'transparent',
                white: '#ffffff',
                lightpurple: '#F7F0FF',
            },
            text: {
                black: '#000000',
                white: '#ffffff',
            },
            accent: {
                white: '#ffffff',
                purple: '#7000E0',
                darkpurple: '#3D007A',
                pink: '#ec4899',
            },
            validation: {
                error: '#DF5050',
                warning: '#FFDA62',
                success: '#84D584',
            },
        },

        extend: {
            aspectRatio: {
                '4/3': '4 / 3',
                '3/4': '3 / 4',
                video: '16 / 9',
                hero: '16 / 8',
                portrait: '4.5 / 5',
            },

            height: {
                '4/3': 'calc(50vw * 0.75)',
            },

            maxWidth: {
                container: '1440px',
                ['container-1/2']: '720px',
                '1/2': '50%',
            },

            fontSize: {
                inherit: 'inherit',
                xxs: '0.625rem', // 10px
                xxl: '1.375rem', // 22px
                '2.5xl': '1.75rem', // 28px
            },

            lineHeight: {
                inherit: 'inherit',
            },

            zIndex: {
                '-1': '-1',
                1: '1',
                full: '9999',
            },

            colors: {
                'color-inherit': 'inherit',
            },

            padding: {
                18: '4.5rem',
                22: '5.5rem',
            },
        },

        variants: {
            extend: {
                lineClamp: ['active'],
            },
        },
    },
    plugins: [
        plugin(function ({ addVariant }) {
            addVariant('wcag', '.wcag &'), addVariant('whitenav', '.whitenav &')
        }),
        require('@tailwindcss/aspect-ratio'),
    ],
}
