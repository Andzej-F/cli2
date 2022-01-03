<?php

namespace App\Controllers;

use \Core\View;
use \App\Flash;
use \App\Models\Patient;

/**
 * Readers controller
 * 
 * PHP version 8.0.7
 */
class RegistrationController extends \Core\Controller
{
    /**
     * Register new patient
     * 
     * @return void
     */
    public function newAction()
    {
        View::render('Registration/new.php');
    }

    /**
     * Show the signup form
     * 
     * @return void
     */
    public function createAction()
    {
        global $argv;

        $patient = new Patient($argv['patient']);

        if ($patient->save()) {

            echo "\033[01;32m Patient successfully added !!!\033[0m\n";

            // After successfull registration show patient's profile page
            View::render('Profile/show.php', [
                'patient' => $patient
            ]);
        } else {

            View::render('Registration/correct.php', [
                'patient' => $patient
            ]);
        }
    }
}
