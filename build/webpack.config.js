const path = require('path')
const webpack = require('webpack')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = env => {
  const plugins = [
    // new CleanWebpackPlugin(['dist']),

    new ExtractTextPlugin('css/styles.css'),

    new CopyWebpackPlugin([{
      from: './src/img',
      to: './img'
    }])
  ]
  
  if (env.NODE_ENV === 'development'){
    const htmlPlugin = new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'src/index.html',
      inject: true
    })

    plugins.push(htmlPlugin)
  }

  return {
    mode: env.NODE_ENV,

    entry: './src/main.js',

    output: {
      filename: 'js/index.js',
      path: path.resolve(__dirname, '../')
    },

    module: {
      rules: [{
        test: /\.js$/,
        loader: "babel-loader",
        exclude: /node_modules/
      }, {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      }, {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [{
            loader: 'css-loader',
            options: {
              minimize: true,
              sourceMap: true
            }
          }, {
            loader: 'sass-loader',
            options: {
              sourceMap: true
            }
          }]
        })
      }, {
        test: /\.(png|jpe?g|gif)(\?.*)?$/,
        loader: 'file-loader',
        options: {
          name: './img/[name].[ext]',
          publicPath: '../'
        }
      }]
    },

    plugins,

    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src')
      }
    },

    devServer: {
      contentBase: '../',
      open: false
    },

    devtool: 'cheap-eval-source-map'
  }

}