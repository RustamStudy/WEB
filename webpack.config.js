const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

const ASSET_PATH = '/assets/';

module.exports = {
    entry: {
        main : [
            "./resource/js/jq.js",
            "./resource/js/films.js",
            "./resource/js/fileUpload.js",
            "./resource/js/custom.js",
            "./resource/js/ajax.js",
        ],
        "styles": ['./resource/css/index.css']
    },
    output: {
        path: path.resolve(__dirname, 'public/assets'),
        filename: '[name].js?[hash:8]',
        sourceMapFilename: '[name].map?[hash:8]',
        chunkFilename: '[id].js?[hash:8]',
        publicPath: ASSET_PATH
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader'],
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                use: [
                    'file-loader',
                ],
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                use: [
                    'file-loader',
                ],
            },
        ],
    },
    plugins:  [
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './resource/img',
                    to: './img'
                },
                {
                    from:'./resource/cinimaImg',
                    to: './img'
                }
            ]
        }),
        new MiniCssExtractPlugin(),
    ],
    optimization: {
        minimize: true,
        minimizer: [
            new CssMinimizerPlugin(),
        ],
    },
};