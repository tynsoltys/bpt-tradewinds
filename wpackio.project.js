const packageJson = require('./package.json')

module.exports = {
    appName: 'lodgepole',
    type: 'theme',
    slug: 'lodgepole',
    bannerConfig: {
        name: packageJson.name,
        author: packageJson.author,
        license: packageJson.license,
        link: packageJson.homepage,
        version: packageJson.version,
        copyrightText: `This software is released under the ${this.license} License\n
                        https://opensource.org/licenses/${this.license}`,
        credit: true,
    },
    files: [
        {
            name: 'app',
            entry: {
                main: ['./assets/js/app.js', './assets/css/app.css'],
            },
            webpackConfig: undefined,
        },
    ],
    outputPath: 'dist',
    hasReact: false,
    disableReactRefresh: false,
    hasSass: false,
    hasLess: false,
    hasFlow: false,
    externals: {},
    alias: undefined,
    errorOverlay: true,
    optimizeSplitChunks: true,
    watch: ['templates/**/*.twig', 'theme/**/*.php'],
    packageFiles: [
        'dist/**',
        'templates/**',
        'theme/**',
        'vendor/**',
        '*.md',
        'LICENSE',
    ],
    packageDirPath: 'package',
}
