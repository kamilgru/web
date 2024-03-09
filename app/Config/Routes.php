<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('admin', static function($routes){
	
		$routes->group('', ['filter'=>'cifilter:auth'], static function($routes){
			$routes->get('home','AdminController::index', ['as'=>'admin.home']);
			$routes->get('logout','AdminController::logoutHandler',['as'=>'admin.logout']);
			
		$routes->get('new-post','AdminController::addPost');
		$routes->post('add', 'AdminController::store');
	});
			
		$routes->group('', ['filter'=>'cifilter:guest'], static function($routes){
			$routes->get('login','AuthController::loginForm',['as'=>'admin.login.form']);
			$routes->post('login', 'AuthController::loginHandler',['as'=>'admin.login.handler']);			
		});
});
