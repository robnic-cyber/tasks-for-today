<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Home::tasks');
$routes->get('profile', 'Home::profile');
$routes->get('about', 'Home::about');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->post('logout', 'Auth::logout');
$routes->get('tasks/new', 'TaskManager::new', ['filter' => 'auth']);
$routes->post('tasks/create', 'TaskManager::create', ['filter' => 'auth']);
$routes->get('tasks/(:num)/edit', 'TaskManager::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/update', 'TaskManager::update/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/delete', 'TaskManager::delete/$1', ['filter' => 'auth']);