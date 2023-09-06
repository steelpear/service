const middleware = {}

middleware['auth'] = require('..\\middleware\\auth.js')
middleware['auth'] = middleware['auth'].default || middleware['auth']

middleware['check'] = require('..\\middleware\\check.js')
middleware['check'] = middleware['check'].default || middleware['check']

export default middleware
