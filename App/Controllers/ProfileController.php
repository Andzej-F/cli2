<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Patient;

/**
 * Profile controller
 * 
 * PHP version 8.0.7
 */
class ProfileController extends \Core\Controller
{
    /**
     * Show the profile
     * 
     * @return void
     */
    public function newAction()
    {
        global $argv;

        $patient = new Patient();

        if ($patient->findByEmail($argv['patient']['email'])) {

            echo "Login successful\n";

            View::render('Profile/show.php');
        } else {

            echo "Login unsuccessful, please try again";

            View::render('Profile/new.php', [
                'patient' => $patient
            ]);
        }
    }

    /**
     * Show the form for editing the profile
     * 
     * @return void
     */
    public function editAction()
    {
        global $argv;
        $patient = new Patient($argv['patient']);

        View::render(
            'Profile/edit.php',
            [
                'patient' => $patient
            ]
        );
    }

    /**
     * Update the profile
     * 
     * @return void
     */
    public function updateAction()
    {
        global $argv;

        $patient = new Patient($argv['patient']);
        // print_r($patient);
        // print_r($argv);

        echo "updateAction";

        // if ($patient->updateProfile($argv)) {

        //     echo ('Changes saved');

        //     View::render('Profile/show.php', [
        //         'patient' => $patient
        //     ]);
        // } else {
        //     View::render('Profile/edit.php', [
        //         'patient' => $patient
        //     ]);
        // }
    }

    /**
     * Delete the author
     * 
     * @return void
     */
    public function deleteAction()
    {
        global $argv;

        $patient = new Patient();

        if ($patient->deletePatient($argv['patient']['email'])) {

            echo "Appointment was successfully deleted";

            View::render('Home/index.php');
        }
    }
}
