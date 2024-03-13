<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('admin', static function($routes){
	
		$routes->group('', ['filter'=>'cifilter:auth'], static function($routes){
			$routes->get('logout','AdminController::logoutHandler',['as'=>'admin.logout']);
			
			
		$routes->get('new-post','AdminController::addPost');
		$routes->post('add', 'AdminController::store');
		$routes->add('register', 'RegController::index');
		$routes->get('search', 'AdminController::search');
		$routes->get('home','AdminController::index');
		$routes->post('home/store', 'AdminController::store');


	});
			
		$routes->group('', ['filter'=>'cifilter:guest'], static function($routes){
			$routes->get('login','AuthController::loginForm',['as'=>'admin.login.form']);
			$routes->post('login', 'AuthController::loginHandler',['as'=>'admin.login.handler']);			
		});
});
