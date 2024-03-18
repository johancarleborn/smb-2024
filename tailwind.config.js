/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './src/js/**/*.js',
        './inc/acf/lightning-builder/page-components/**/*.php',
        './inc/acf/article-builder/article-components/**/*.php',
        './**/*.php',
    ],
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
            sans: ['Inter', 'sans-serif'],
            material: ['"Material Icons Round"', 'sans-serif'],
        },

        colors: {
            transparent: 'transparent',
            white: '#ffffff',
            black: '#000000',
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
                50: '#eff6ff',
                100: '#dbeafe',
                200: '#bfdbfe',
                300: '#93c5fd',
                400: '#60a5fa',
                500: '#3b82f6',
                600: '#2563eb',
                700: '#1d4ed8',
                800: '#1e40af',
                900: '#1e3a8a',
            },
            background: {
                transparent: 'transparent',
                white: '#ffffff',
                black: '#000C24',
            },
            text: {
                black: '#000000',
                white: '#ffffff',
            },
            accent: {
                blue: '#3b82f6',
                gray: '#6b7280',
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
                '2.5xl': '1.75rem',
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
    plugins: [require('@tailwindcss/aspect-ratio')],
}
