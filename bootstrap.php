<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// PSR-0 autoloading: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

$config = require_once 'config.php';

use MyFramework\Core\Database as Database;
use MyFramework\Core\Logger as Logger;
use MyFramework\Core\DIContainer as DIContainer;
use MyFramework\Core\ServiceLocator as ServiceLocator;
use MyFramework\Controllers\IndexController as IndexController;
use MyFramework\Controllers\PostsController as PostsController;
use MyFramework\Http\Routing\Router as Router;
use MyFramework\Http\Routing\Route as Route;

$init = function() use ($config) {
    $di = new DIContainer();
    $di->set(IndexController::class, new IndexController());
    $di->set(PostsController::class, new PostsController(
        new MyFramework\Repositories\PostRepository()
    ));
    $di->set('Router', new Router());
    $di->set('logger', new Logger());
    $di->set('database', Database::getInstance($di->get('logger'), $config));

    ServiceLocator::setContainer($di);
};

$init();

$router = ServiceLocator::get('Router');

$router->addRoute(
    new Route(
        '/posts',
        PostsController::class
    ));

$router->dispatch();
