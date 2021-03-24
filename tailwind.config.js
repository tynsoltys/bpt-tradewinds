module.exports = {
    darkMode: 'media',
    purge: [
        'assets/templates/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    theme: {
        colors: {
            'brand-primary': '#092440',
            'brand-primary-medium': '#34526b',
            'brand-primary-light': '#e6edf5',
            'brand-secondary': '#84abcc',
            'brand-secondary-toned': '#628099',
            'brand-secondary-light': '#d5e2ed',
            'brand-black': '#212121',
            'brand-white': '#ffffff',
            'accent-blue': '#2b7bb9',
            'accent-blue-medium':'#7FAFD5',
            'accent-blue-light': '#D4E4F1',
            'accent-blue-fade': 'rgba(131, 171, 204, 0.2)',
            'accent-gold': '#f5a623',
            'accent-gold-light': '#ffc76a',
            'accent-gold-fade': 'rgba(245, 166, 35, 0.1)',
            'accent-red': '#cc3b3b',
            'accent-green': '#40863f',
            'text-primary': '#212121',
            'text-secondary': '#3b4249',
            'gray-dark': '#757575',
            'gray-medium': '#bdbdbd',
            'gray-light': '#f4f6f8',
            'background-main': '#f7f8fa',
        },
        extend: {
            gridTemplateColumns: {
              // Complex site-specific column configuration
             'concise': '200px 1fr 1fr 1fr 1fr 1fr 50px',
             'full': '250px 1fr 1fr 1fr 1fr 1fr',
            },
            gridTemplateRows: {
             'full': '60px auto auto',
            }
        }
    },

}
