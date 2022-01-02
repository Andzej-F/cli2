<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 * 
 * PHP version 8.0.7
 */
class HomeController extends \Core\Controller
{

    /**
     * Show the index page
     * 
     * @return void
     */
    public function indexAction()
    {
        // echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
        View::render('Home/index.php');
    }
}
