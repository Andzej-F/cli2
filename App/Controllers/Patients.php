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
class Patients extends \Core\Controller
{
    /**
     * Show the patient's information
     * 
     * @return void
     */
    public function indexAction()
    {
        // echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
        View::render('Patients/index.php');
    }

    /**
     * Register new patient
     * 
     * @return void
     */
    public function newAction()
    {
        View::render('Patients/new.php');
    }

    /**
     * Show the signup form
     * 
     * @return void
     */
    public function createAction()
    {
        // echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";

        global $argv, $router;

        $patient = new Patient($argv['patient']);

        if ($patient->save()) {

            // Redirect to avoid form resubmission
            // Flash::addMessage('Patient successfully added');
            echo "\033[01;32m Patient successfully added !!!\033[0m\n";
            $router->dispatch("patients_index");
        } else {

            View::render('Patients/new_correct.php', [
                'patient' => $patient
            ]);
        }
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function loginAction()
    {
        View::render('Patients/login_new.php');
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function loginCreateAction()
    {
        global $argv;

        $patient = new Patient();

        if ($patient->findByEmail($argv['patient']['email'])) {

            echo "Login successful\n";

            View::render('Patients/menu.php');
        } else {

            echo "Login unsuccessful, please try again";

            View::render('Patients/new.php', [
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
        echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
    }

    /**
     * Edit patient's account
     * 
     * @return void
     */
    public function editAction()
    {
        global $argv;

        $patient = new Patient();

        $patient->findByEmail($argv['patients']['email']);

        View::render('Patients/edit.php', [
            'patient' => $patient
        ]);
    }

    /**
     * Update patient's account
     * 
     * @return void
     */
    public function updateAction()
    {
    }

    /**
     * Delete the account
     * 
     * @return void
     */
    public function delete()
    {
        echo "Hello from the " . __FUNCTION__ . " action in the " . __CLASS__ . " controller!";
    }
}
