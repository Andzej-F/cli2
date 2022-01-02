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

    // /**
    //  * Show the login page
    //  * 
    //  * @return void
    //  */
    // public function loginAction()
    // {
    //     View::render('Patients/login_new.php');
    // }

    // /**
    //  * Show the login page
    //  * 
    //  * @return void
    //  */
    // public function loginCreateAction()
    // {
    //     global $argv;

    //     $patient = new Patient();

    //     if ($patient->findByEmail($argv['patient']['email'])) {

    //         echo "Login successful\n";

    //         View::render('Patients/menu.php');
    //     } else {

    //         echo "Login unsuccessful, please try again";

    //         View::render('Patients/new.php', [
    //             'patient' => $patient
    //         ]);
    //     }
    // }

    // /**
    //  * Logout
    //  * 
    //  * @return void
    //  */
    // public function logout()
    // {
    //     echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
    // }

    // /**
    //  * Edit patient's account
    //  * 
    //  * @return void
    //  */
    // public function editAction()
    // {
    //     global $argv;

    //     $patient = new Patient();

    //     $patient->findByEmail($argv['patients']['email']);

    //     View::render('Patients/edit.php', [
    //         'patient' => $patient
    //     ]);
    // }

    // /**
    //  * Update patient's account
    //  * 
    //  * @return void
    //  */
    // public function updateAction()
    // {
    // }

    // /**
    //  * Delete the account
    //  * 
    //  * @return void
    //  */
    // public function delete()
    // {
    //     echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
    // }
}
