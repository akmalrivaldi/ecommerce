<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::registerProcess');
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'dashboard::index', ['filter' => 'auth']);
$routes->get('/admin/dashboard', 'dashboard::admin', ['filter' => 'auth:admin']);
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Menu Produk
    $routes->get('products', 'Admin\ProductController::index');
    $routes->get('products/create', 'Admin\ProductController::create');
    $routes->post('products/store', 'Admin\ProductController::store');
    $routes->get('products/edit/(:num)', 'Admin\ProductController::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\ProductController::update/$1');
    $routes->get('products/delete/(:num)', 'Admin\ProductController::delete/$1');

    // Menu Kategori
    $routes->get('categories', 'Admin\CategoryController::index');
    $routes->get('categories/create', 'Admin\CategoryController::create');
    $routes->post('categories/store', 'Admin\CategoryController::store');
    $routes->get('categories/edit/(:num)', 'Admin\CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'Admin\CategoryController::update/$1');
    $routes->get('categories/delete/(:num)', 'Admin\CategoryController::delete/$1');

    // Menu Laporan Orders
    $routes->get('orders', 'Admin\OrderController::index');

    // Menu Pengelolaan User
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/delete/(:num)', 'Admin\UserController::delete/$1');
});




$routes->get('/user/dashboard', 'dashboard::user', ['filter' => 'auth']);

// $routes->get('/admin/dashboardAdmin', 'Admin::dashboard');
// $routes->get('/admin/addCategory', 'Admin::addCategory');
// $routes->post('/admin/saveCategory', 'Admin::saveCategory');
// $routes->get('/admin/addProduct', 'Admin::addProduct');
// $routes->post('/admin/saveProduct', 'Admin::saveProduct');




// $routes->get('/', 'dashboard::user');
// $routes->get('/admin', 'dashboard::admin');
// $routes->get('/user', 'dashboard::user');

