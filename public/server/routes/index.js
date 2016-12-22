var express = require('express');
var router = express.Router();
var hostConf = require('./jello_conf');

var Proxy = function (app) {

	var Jello = require('./jello')(app, router);
	var host = Jello.mapModingValue(hostConf, 'ND_LEHI_ENV');
	var proxy = Jello.host(host).protocol('http');

	var apiList=[
					'/user/register','/user/login','/user/logout','/user/init_password',
					'/popular/more','/user/info/update','/user/update_pay_info','/user/info',
					'/user/pay_info','/user/order','/search/get_more'
				];

	apiList.forEach(function(v,k){
		var serverApi = proxy.api(v);
		Jello.api(v).map(serverApi);
	})
	return router;
}

module.exports = Proxy;
