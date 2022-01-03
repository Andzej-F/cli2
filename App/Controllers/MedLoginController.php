<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Patient;

/**
 * Readers controller
 * 
 * PHP version 8.0.7
 */
class MedLoginController extends \Core\Controller
{

    /**
     * Register new patient
     * 
     * @return void
     */
    public function newAction()
    {
        View::render('MedLogin/new.php');
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function createAction()
    {
        global $argv;

        $patient = Patient::findByEmail($argv['patient']['email']);

        if ($patient) {

            echo "Login successful\n";

            View::render('Profile/show.php');
        } else {

            echo "Login unsuccessful, please try again";

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
