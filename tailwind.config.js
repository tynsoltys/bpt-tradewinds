module.exports = {
    darkMode: 'media',
    purge: [
        'templates/**/*.twig',
        'theme/**/*.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
