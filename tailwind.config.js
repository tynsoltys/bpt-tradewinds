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
            'brand-white-fade': 'rgba(255,255,255,0.7)',
            'accent-blue': '#2b7bb9',
            'accent-blue-medium':'#7FAFD5',
            'accent-blue-light': '#D4E4F1',
            'accent-blue-fade': 'rgba(131, 171, 204, 0.2)',
            'accent-gold': '#f5a623',
            'accent-gold-light': '#ffc76a',
            'accent-gold-fade': 'rgba(245, 166, 35, 0.1)',
            'accent-red':'#cc3b3b',
            'accent-red-fade': 'rgba(204, 59, 59,0.4)',
            'accent-red-light':'#db7070',
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
             'concise': '180px 1fr 1fr 1fr 1fr 1fr 50px',
             'concise-xs': '150px 1fr 50px 50px',
             'concise-sm': '160px 1fr 1fr 1fr 50px 50px',
             'concise-md': '160px 1fr 1fr 1fr 1fr 1fr 50px',
             'concisetac': '100px 1fr 1fr 1fr 1fr 1fr 30px',
             'acc': '2.5fr 1.5fr 1.5fr 1.5fr 2fr 1.2fr 50px',
             'acctachome': '2.5fr 1.5fr 1.5fr 1.5fr 1.2fr 50px',
             'acc-xs': '150px 1fr 50px 50px',
             'acc-legs-mobile': '15px 1fr 1fr 1fr 15px',
             'acc-sm': '160px 1fr 1fr 1fr 50px 50px',
             'acc-md': '160px 1fr 1fr 1fr 1fr 1fr 50px',
             'acctac': '100px 1fr 1fr 1fr 1fr 1fr 30px',
             'acctac-xs': '150px 1fr 35px 25px',
             'full': '250px 1fr 1fr 1fr 1fr 1fr',
             'bot': '250px 1fr 1fr 1fr 1fr 1fr 1.5fr',
             'leg': '20px 1.7fr 2fr 2fr 50px 2fr 1.7fr 1fr 1fr 30px',
            },
            gridTemplateRows: {
             'full': '60px auto auto',
            },

        }
    },
    variants: {
        extend: {
            backgroundColor: ['odd', 'even'],
        }
    }

}
