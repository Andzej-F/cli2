<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Patient;

/**
 * Readers controller
 * 
 * PHP version 8.0.7
 */
class LoginController extends \Core\Controller
{

    /**
     * Register new patient
     * 
     * @return void
     */
    public function newAction()
    {
        View::render('Login/new.php');
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function createAction()
    {
        global $argv;

        $patient = Patient::findByNID($argv['patient']['nid']);

        if ($patient) {

            echo "Login successful\n";

            View::render('Profile/show.php', [
                'patient' => $patient
            ]);
        } else {

            echo "\n\nLogin unsuccessful, please try again\n\n";

            View::render('Login/new.php', [
                'patient' => $patient
            ]);
        }
    }

    /**
     * Logout
     * 
     * @return void
     */
    public function logout()
    {
        View::render('Home/index.php',);
    }
}
