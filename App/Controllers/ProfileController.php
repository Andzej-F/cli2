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
     * Display user's details
     * 
     * @return void
     */
    public function showAction()
    {
        global $argv;

        $patient = Patient::findByNID($argv['patient']['nid']);

        View::render('Profile/show.php', [
            'patient' => $patient
        ]);
    }

    /**
     * Show the profile
     * 
     * @return void
     */
    public function newAction()
    {
        global $argv;

        $patient = Patient::findByNID($argv['patient']['nid']);

        if ($patient) {

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

        $patient = Patient::findByNID($argv['patient']['nid']);

        View::render(
            'Profile/edit.php',
            [
                'patient' => $patient
            ]
        );
    }

    /**
     * Show the form for correcting the profile editing mistakes
     * 
     * @return void
     */
    public function correctAction()
    {
        global $argv;

        $patient = Patient::findByNID($argv['patient']['nid']);

        View::render(
            'Profile/correct.php',
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

        // print_r($argv);

        $patient = Patient::findByNID($argv['patient']['nid']);

        // print_r($patient);
        // exit;

        if ($patient->updateProfile($argv['patient'])) {

            echo "Profile updated successfully\n";

            View::render('Profile/show.php', [
                'patient' => $patient
            ]);
        } else {
            // echo "Line 100 ";
            View::render('Profile/edit.php', [
                'patient' => $patient
            ]);
        }
    }

    /**
     * Delete the author
     * 
     * @return void
     */
    public function deleteAction()
    {
        global $argv;

        $patient = Patient::findByNID($argv['patient']['nid']);

        if ($patient->deletePatient()) {

            echo "\nProfile was successfully deleted\n";

            View::render('Home/index.php');
        }
    }
}
