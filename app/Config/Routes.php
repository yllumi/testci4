<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('test', 'Home::index');
$routes->get('test/email', 'Home::email');

$routes->get('checkToken/(:any)', 'Home::checkToken/$1');

// Api
$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    // Route login
    $routes->post('auth/register', 'AuthController::register');
    $routes->post('auth/login', 'AuthController::login');
    $routes->post('auth/forgot-password', 'AuthController::forgotPassword');
    $routes->post('auth/reset-password', 'AuthController::resetPassword');
    $routes->post('auth/send-otp', 'AuthController::sendOtp');
    $routes->post('auth/send-otp-email', 'AuthController::sendOtpEmail');
    $routes->post('auth/verify-otp', 'AuthController::verifyOtp');
    $routes->post('auth/verify-otp-email', 'AuthController::verifyOtpEmail');
    $routes->post('auth/register', 'AuthController::register');

    // Route scholarship
    $routes->get('scholarship', 'ScholarshipController::index');
    $routes->post('scholarship', 'ScholarshipController::register');
    $routes->get('scholarship/settings', 'ScholarshipController::frontendSettings');

    $routes->get('referral', 'ScholarshipController::userReferral');
    $routes->post('user/profile/update', 'UserController::saveProfile');
    $routes->get('program', 'ScholarshipController::program');
    
    $routes->get('push/send', 'WebpushController::send');
    $routes->post('push/register', 'WebpushController::register');
    $routes->get('push/generate_vapid', 'WebpushController::generateVAPID');
    
    $routes->get('wasender', 'WASenderController::index');
    $routes->post('wasender/incoming', 'WASenderController::incoming');
});
