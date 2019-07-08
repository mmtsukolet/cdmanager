const path = require('path')
const webpack = require('webpack')

let src_path = 'resources/assets/js/'

module.exports = {
  node: {
    fs: "empty"
  },
  resolve: {
    alias: {
      "@assets": path.resolve(__dirname, 'resources/assets'),
      "@components": path.resolve(__dirname, src_path + 'components')
    }
  },
}