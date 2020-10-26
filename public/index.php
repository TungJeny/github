<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
// Start session

if(!session_id()){
    session_start();
}

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
// $router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('', ['controller' => 'LoginController', 'action' => 'login']);
$router->add('login', ['controller' => 'LoginController', 'action' => 'login']);
$router->add('logout', ['controller' => 'LoginController', 'action' => 'logout']);
$router->add('admin/home', ['controller' => 'AdminController', 'action' => 'index']);
$router->add('admin/repo', ['controller' => 'RepoController', 'action' => 'getRepo']);
$router->add('admin/repo/general', ['controller' => 'RepoController', 'action' => 'postRepo']);
// $router->add('admin/repo/clone/{id_repo:\d+}', ['controller' => 'RepoController', 'action' => 'cloneRepo']);
$router->add('admin/repo/cloneRepo/{id:\d+}', ['controller' => 'RepoController', 'action' => 'cloneRepo']);
$router->add('admin/repo/data', ['controller' => 'RepoController', 'action' => 'listRepo']);
$router->add('admin/forks', ['controller' => 'RepoController', 'action' => 'forksRepo']);


$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
