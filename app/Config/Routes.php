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
    $routes->get('orders', 'Admin\OrderAdminController::index');

    // Menu Pengelolaan User
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/delete/(:num)', 'Admin\UserController::delete/$1');
});




$routes->get('/user/dashboard', 'dashboard::user', ['filter' => 'auth']);
$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'User\DashboardController::index');
    $routes->get('cart', 'User\CartController::index');
    $routes->post('cart/add', 'User\CartController::add');
    $routes->post('cart/remove', 'User\CartController::remove');
    $routes->get('checkout', 'User\CheckoutController::index');
    $routes->post('checkout/submit', 'User\CheckoutController::submit');
    $routes->get('orders', 'User\OrderController::index');
});

$routes->group('cart', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'CartController::index', ['as' => 'cart.index']);
    $routes->post('add', 'CartController::add', ['as' => 'cart.add']);
    $routes->post('update', 'CartController::update', ['as' => 'cart.update']);
    $routes->get('delete/(:num)', 'CartController::delete/$1', ['as' => 'cart.delete']);
    $routes->post('checkout', 'CartController::checkout', ['as' => 'cart.checkout']);
    $routes->get('orders', 'OrderController::index', ['filter' => 'auth']);
    $routes->post('updateQuantity', 'CartController::updateQuantity');
    $routes->post('orders/pay', 'OrderController::pay');

});
$routes->get('profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->post('profile/update', 'ProfileController::update', ['filter' => 'auth']);
$routes->post('orders/payment', 'OrderController::payment');



// $routes->get('/admin/dashboardAdmin', 'Admin::dashboard');
// $routes->get('/admin/addCategory', 'Admin::addCategory');
// $routes->post('/admin/saveCategory', 'Admin::saveCategory');
// $routes->get('/admin/addProduct', 'Admin::addProduct');
// $routes->post('/admin/saveProduct', 'Admin::saveProduct');




// $routes->get('/', 'dashboard::user');
// $routes->get('/admin', 'dashboard::admin');
// $routes->get('/user', 'dashboard::user');

