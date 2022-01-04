<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Personnel;

/**
 * Readers controller
 * 
 * PHP version 8.0.7
 */
class MedController extends \Core\Controller
{
    /**
     * Register new patient
     * 
     * @return void
     */
    public function loginAction()
    {
        View::render('Med/login.php');
    }

    /**
     * Show the login page
     * 
     * @return void
     */
    public function showMenuAction()
    {
        global $argv;

        $personnel = Personnel::findByMedID($argv['med_id']);

        if ($personnel) {

            echo "Employee login successful\n";

            View::render('Med/menu.php', [
                'personnel' => $personnel
            ]);
        } else {

            echo "Login unsuccessful, please try again";

            View::render('Med/login.php');
        }
    }

    /**
     * Display appointments dates
     * 
     * @return void
     */
    public function showDatesAction()
    {
        $dates = Personnel::showAppDates();

        View::render('Med/dates.php', [
            'dates' => $dates
        ]);
    }

    /**
     * Display appointments dates
     * 
     * @return void
     */
    public function showDetailsAction()
    {
        global $argv;

        $details = Personnel::showAppDetails($argv['date']);

        View::render('Med/details.php', [
            'date' => $argv['date'],
            'details' => $details
        ]);
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
