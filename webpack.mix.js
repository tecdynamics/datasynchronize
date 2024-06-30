const mix = require('laravel-mix')
const path = require('path')

const directory = path.basename(path.resolve(__dirname))
const source = `platform/packages/${directory}`
const dist = `public/vendor/core/packages/${directory}`

mix
    .sass(`${source}/resources/sass/datasynchronize.scss`, `${dist}/css`)
    .js(`${source}/resources/js/datasynchronize.js`, `${dist}/js`)

if (mix.inProduction()) {
    mix
        .copy(`${dist}/css/datasynchronize.css`, `${source}/public/css`)
        .copy(`${dist}/js/datasynchronize.js`, `${source}/public/js`)
}
