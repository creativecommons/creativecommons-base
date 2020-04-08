const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CopyPlugin = require('copy-webpack-plugin')

module.exports = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'js/bundle.js'
  },
  module: {
    rules: [{
      test: /\.scss$/,
      use: [
        MiniCssExtractPlugin.loader,
        {
          loader: 'css-loader'
        },
        {
          loader: 'sass-loader',
          options: {
            sourceMap: true,
          }
        }
      ]
    }]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../../assets/css/styles.css'
    }),
    new CopyPlugin([
      { from: './node_modules/@creativecommons/vocabulary/assets', to: '../../assets/img' },
      { from: './node_modules/@glidejs/glide/dist/glide.min.js', to: '../../assets/js' }
    ]),
  ]
}
