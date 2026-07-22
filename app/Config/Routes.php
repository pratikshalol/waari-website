<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Public Routes ───────────────────────────────────────────
$routes->get('/', 'Home::index');
$routes->get('about', 'About::index');

$routes->get('products', 'Products::index');
$routes->post('products/enquire', 'Products::enquire');
$routes->get('products/(:segment)', 'Products::detail/$1');

$routes->get('gallery', 'Gallery::index');
$routes->get('testimonials', 'Testimonials::index');

$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');

// ── User Auth Routes ────────────────────────────────────────
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginPost');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerPost');
$routes->get('logout', 'Auth::logout');

// ── User Profile Routes ─────────────────────────────────────
$routes->get('profile', 'UserProfile::index');
$routes->post('profile/update', 'UserProfile::update');
$routes->post('profile/password', 'UserProfile::changePassword');
$routes->get('profile/enquiries', 'UserProfile::enquiries');

// ── Admin Routes ────────────────────────────────────────────
$routes->get('admin', function() {
    return redirect()->to(base_url('admin/dashboard'));
});
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::loginPost');
$routes->get('admin/logout', 'Admin\Auth::logout');

$routes->group('admin', ['filter' => 'adminAuth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Products
    $routes->get('products', 'Admin\Products::index');
    $routes->get('products/create', 'Admin\Products::create');
    $routes->post('products/store', 'Admin\Products::store');
    $routes->get('products/edit/(:num)', 'Admin\Products::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\Products::update/$1');
    $routes->get('products/delete/(:num)', 'Admin\Products::delete/$1');

    // Categories
    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/create', 'Admin\Categories::create');
    $routes->post('categories/store', 'Admin\Categories::store');
    $routes->get('categories/edit/(:num)', 'Admin\Categories::edit/$1');
    $routes->post('categories/update/(:num)', 'Admin\Categories::update/$1');
    $routes->get('categories/delete/(:num)', 'Admin\Categories::delete/$1');

    // Testimonials
    $routes->get('testimonials', 'Admin\Testimonials::index');
    $routes->get('testimonials/create', 'Admin\Testimonials::create');
    $routes->post('testimonials/store', 'Admin\Testimonials::store');
    $routes->get('testimonials/edit/(:num)', 'Admin\Testimonials::edit/$1');
    $routes->post('testimonials/update/(:num)', 'Admin\Testimonials::update/$1');
    $routes->get('testimonials/delete/(:num)', 'Admin\Testimonials::delete/$1');

    // Gallery
    $routes->get('gallery', 'Admin\Gallery::index');
    $routes->get('gallery/create', 'Admin\Gallery::create');
    $routes->post('gallery/store', 'Admin\Gallery::store');
    $routes->get('gallery/delete/(:num)', 'Admin\Gallery::delete/$1');

    // Website Content
    $routes->get('content/about', 'Admin\Content::about');
    $routes->post('content/about/update', 'Admin\Content::updateAbout');
    $routes->get('content/contact', 'Admin\Content::contact');
    $routes->post('content/contact/update', 'Admin\Content::updateContact');

    // Enquiries
    $routes->get('enquiries', 'Admin\Enquiries::index');
    $routes->get('enquiries/view/(:num)', 'Admin\Enquiries::view/$1');
    $routes->post('enquiries/update-status/(:num)', 'Admin\Enquiries::updateStatus/$1');
    $routes->get('enquiries/delete/(:num)', 'Admin\Enquiries::delete/$1');
});
