let mix = require('laravel-mix');
let Path = require('path');
let ImageminPlugin     = require('imagemin-webpack-plugin').default;
let CopyWebpackPlugin  = require('copy-webpack-plugin');
let imageminMozjpeg    = require('imagemin-mozjpeg');

mix
    .setPublicPath('assetsPublic/public')
    .webpackConfig({
        resolve: {
            alias: {
                // "TweenLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
            }
        },
        plugins: [
            // Compress images
            // new CopyWebpackPlugin([{
            //     from: 'assets/img', // FROM
            //     to: 'img/', // TO
            // }]),

            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                pngquant: {
                    quality: '65-80'
                },
                plugins: [
                    imageminMozjpeg({
                        quality: 65,
                        // maxmemory: 1000 * 512
                    })
                ]
            })
        ],
    })
    .sass("assets/sass/admin.sass", "assetsPublic/public/css")
    .js("assets/js/admin.js", "assetsPublic/public/js")
    .copyDirectory('assetsPublic/public', '../../../public')
