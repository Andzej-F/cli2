<?php

/**
 * Front controller
 *
 * PHP version 8.0.7
 */

/**
 * Autoloader
 */
spl_autoload_register('myAutoloader', true, false);

// "myAutoloader" will run when autoloader is needed
function myAutoloader($className)
{
    $root = dirname(__DIR__, 1); // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_readable($file)) {
        require $file;
    }
}
// require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Routing
 */
$router = new Core\Router();

$router->add('index', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('exit', ['controller' => 'HomeController', 'action' => 'exit']);

$router->add('reg', ['controller' => 'RegistrationController', 'action' => 'new']);
$router->add('registration_create', ['controller' => 'RegistrationController', 'action' => 'create']);
$router->add('registration_correct', ['controller' => 'RegistrationController', 'action' => 'correct']);

$router->add('profile_show', ['controller' => 'ProfileController', 'action' => 'show']);
$router->add('edit', ['controller' => 'ProfileController', 'action' => 'edit']);
$router->add('edit_correct', ['controller' => 'ProfileController', 'action' => 'correct']);
$router->add('profile_update', ['controller' => 'ProfileController', 'action' => 'update']);
$router->add('delete', ['controller' => 'ProfileController', 'action' => 'delete']);

$router->add('login', ['controller' => 'LoginController', 'action' => 'new']);
$router->add('login_create', ['controller' => 'LoginController', 'action' => 'create']);
$router->add('logout', ['controller' => 'LoginController', 'action' => 'logout']);

$router->add('med_login', ['controller' => 'MedController', 'action' => 'login']);
$router->add('med_menu', ['controller' => 'MedController', 'action' => 'showMenu']);
$router->add('dates', ['controller' => 'MedController', 'action' => 'showDates']);
$router->add('details', ['controller' => 'MedController', 'action' => 'showDetails']);

// Show the main menu
$router->dispatch("index");
