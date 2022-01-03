<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 * 
 * PHP version 8.1.1
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
        View::render('Home/index.php');
    }

    /**
     * Exit the application
     * 
     * @return void
     */
    public function exitAction()
    {
        exit("Application closed");
    }
}
