module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
        defaultLineHeights: true,
        standardFontWeights: true,
    },
    purge: ['templates/**/*.twig'],
    plugins: [require('@tailwindcss/typography')],
}
