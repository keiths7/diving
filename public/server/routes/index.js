var express = require('express');
var router = express.Router();
var hostConf = require('./jello_conf');

var Proxy = function (app) {
	// import Seed Jello
	var Jello = require('./jello')(app, router);
	var host = Jello.mapModingValue(hostConf, 'ND_LEHI_ENV');
	// config server api seed 
	var proxy = Jello.host(host).protocol('http');
	var checkBuy = proxy.api('/user/register');
	Jello.api('/user/register').map(checkBuy);
	return router;
}

module.exports = Proxy;
