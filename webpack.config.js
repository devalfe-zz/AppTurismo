//  webpack.config.js 
const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const DEBUG = process.env.NODE_ENV !== 'production';

// >> Target Structure <<
// > Root App
const APP_FOLDER = path.resolve(__dirname, 'public');
// > Dist
const DIST_FOLDER = path.resolve(APP_FOLDER, 'dist');
const DIST_FOLDER_STYLE = path.resolve(DIST_FOLDER, '/css');
const DIST_FOLDER_IMG = path.resolve(DIST_FOLDER, '/');


const DIST_FILE_JS_BUNDLE = 'js/app.js';
const DIST_FILE_CSS_BUNDLE_NAME = 'app.css';
const DIST_FILE_CSS_BUNDLE = `css/${DIST_FILE_CSS_BUNDLE_NAME}`;
// > Src
const SRC_FOLDER = path.resolve(APP_FOLDER, 'src');
const SRC_FILE_JS_APP = path.resolve(SRC_FOLDER, 'index.js');

module.exports = {
    mode: 'production',
    entry: SRC_FILE_JS_APP,
    //entry: ['./assets/css/fonts.css', './assets/css/owl.carousel.min.css'],
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
        ], // rules

    }, // module

    devtool: DEBUG ? 'source-map' : '',
    context: __dirname,
    target: 'web',
    plugins: DEBUG ? [
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
            host: '192.168.10.1',
            port: 3000,
            proxy: 'appturismo.test',
            online: true,
            logConnections: false,
            reloadOnRestart: true,
            notify: true,
            open: false, //false, local, external, ui, tunnel
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
        // new webpack.optimize.UglifyJsPlugin({
        //     sourceMap: false,
        //     mangle: false,
        // }),
        // > CSS Bundle
        new ExtractTextPlugin({
            filename: DIST_FILE_CSS_BUNDLE,
            disable: false,
            allChunks: true,
        }),
        // > Minimize CSS
        new OptimizeCssAssetsPlugin({
            // assetNameRegExp: DIST_FILE_CSS_BUNDLE_NAME,
            // cssProcessor: require('cssnano'),
            // cssProcessorOptions: {
            //     discardComments: {
            //         removeAll: true
            //     },
            // },
            // canPrint: true,
        }),
    ], // plugins
    cache: false,
    watchOptions: {
        aggregateTimeout: 1000,
        poll: true,
    },
    devServer: {
        contentBase: APP_FOLDER,
        publicPath: "/",
        historyApiFallback: true,
        inline: true,
        host: '192.168.10.1',
        //port: 9000,
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