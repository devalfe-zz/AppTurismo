//  webpack.config.js
const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const autoprefixer = require('autoprefixer');

const DEBUG = process.env.NODE_ENV !== 'production';

// >> Target Structure <<
// > Root App
const APP_FOLDER = path.resolve(__dirname, 'public');
// > Dist
const DIST_FOLDER = path.resolve(APP_FOLDER, 'dist');
const DIST_FOLDER_STYLE = path.resolve(DIST_FOLDER, '/css');
const DIST_FOLDER_IMG = path.resolve(DIST_FOLDER, './');


const DIST_FILE_JS_BUNDLE = 'js/app.js';
const DIST_FILE_CSS_BUNDLE_NAME = 'app.css';
const DIST_FILE_CSS_BUNDLE = 'css/' + DIST_FILE_CSS_BUNDLE_NAME;
// > Src
const SRC_FOLDER = path.resolve(APP_FOLDER, 'src');
const SRC_FILE_JS_APP = path.resolve(SRC_FOLDER, 'index.js');

module.exports = {
    mode: 'production',
    entry: SRC_FILE_JS_APP,
    //entry: {
    //|font: '../AppTurismo/resources/assets/css/fonts.css',
    //carusel: '../AppTurismo/resources/assets/css/owl.carousel.min.css'
    //},
    output: {
        path: DIST_FOLDER,
        publicPath: '/public',
        filename: DIST_FILE_JS_BUNDLE,
        sourceMapFilename: 'sourcemaps/[file].map',
    },
    // > Module Folders (packages and extensions)
    resolve: {
        modules: ['node_modules', APP_FOLDER],
        extensions: ['.js', '.json', '.jsx', '.css', '.scss'],
        descriptionFiles: ['package.json'],
    },
    // > Module Handles
    module: {
        rules: [
            // > JS / JSX
            {
                test: /\.(js|jsx)?$/,
                loader: 'babel-loader',
                include: [APP_FOLDER],
                exclude: /(node_modules)/,
                options: {
                    presets: ['env'],
                },
            },
            // > CSS / SCSS
            {
                test: /\.(css|scss)?$/,
                use: ExtractTextPlugin.extract({
                    //fallback: 'style-loader/url!file-loader',
                    use: ['css-loader', 'sass-loader'],
                    publicPath: DIST_FOLDER_STYLE,
                }),
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                exclude: /node_modules/,
                loader: 'file-loader',
                options: {
                    // name: 'images/[name].[hash:7].[ext]'
                    name: '/[name].[ext]',
                    publicPath: DIST_FOLDER_IMG,
                }
            },
            {
                test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
                loader: 'url-loader',
                options: {
                    limit: 10000
                }
            },
        ], // rules

    }, // module

    devtool: DEBUG ? 'source-map' : '',
    context: __dirname,
    target: 'web',
    plugins: DEBUG ? [
        autoprefixer,
        // > Configure CSS Bundle file
        new ExtractTextPlugin({
            filename: DIST_FILE_CSS_BUNDLE,
            disable: false,
            allChunks: true,
        }),
        new BrowserSyncPlugin({
            // browse to http://localhost:3000/ during development,
            // ./public directory is being served
            files: [
                './public/dist/js/*.js',
                './public/dist/css/*.css',
                './views/*.php'
            ],
            host: '192.168.10.10',
            port: 3000,
            proxy: 'appturismo.test',
            online: true,
            logConnections: false,
            reloadOnRestart: true,
            notify: true,
            open: true, //false, local, external, ui, tunnel
            injectChanges: true,
            logSnippet: true,
            browser: ["google chrome", "firefox"]
                //server: {aseDir: ['public']}
        }),
    ] : [
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: JSON.stringify('production'),
            },
        }),
        new webpack.optimize.OccurrenceOrderPlugin(),
        // > Minimize JS
        new UglifyJSPlugin({
            cache: true,
            parallel: true,
            sourceMap: false,
            //     mangle: false,
        }),
        // > CSS Bundle
        new ExtractTextPlugin({
            filename: DIST_FILE_CSS_BUNDLE,
            disable: false,
            allChunks: true,
        }),
        // > Minimize CSS
        new OptimizeCssAssetsPlugin({
            //assetNameRegExp: DIST_FILE_CSS_BUNDLE_NAME,
            //assetNameRegExp: /\.optimize\.css$/g,
            assetNameRegExp: 'app.css',
            cssProcessor: require('cssnano'),
            cssProcessorOptions: {
                safe: true,
                discardComments: {
                    removeAll: true
                }
            },
            canPrint: true
        }),
        new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // both options are optional
            filename: "app.css",
            //chunkFilename: "[name].css"
        }),
    ], // plugins
    cache: false,
    watchOptions: {
        aggregateTimeout: 1000,
        poll: true,
    },
    devServer: {
        contentBase: APP_FOLDER,
        publicPath: "/public",
        historyApiFallback: true,
        hot: true,
        inline: true,
        host: '192.168.10.10',
        port: 8080,
        proxy: {
            '*': {
                target: 'http://appturismo.test/',
                changeOrigin: true,
            },
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
        watchContentBase: true,
        watchOptions: {
            poll: true, // might be needed for homestead/vagrant setup, review
        },
        compress: true,
        overlay: {
            warnings: true,
            errors: true
        }
    },

}