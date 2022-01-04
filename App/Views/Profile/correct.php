<?php

global $argv;
global $router;

if ($patient->validationErrors($patient->errors)) {
    echo "Errors\n";
    foreach ($patient->errors as $error_type => $errors) {
        foreach ($errors as $key => $error) {
            echo "$error\n";
        }
    }
}

if ($patient->validationErrors($patient->errors)) {
    if (!empty($patient->errors["name_errors"])) {
        $argv['patient']['name'] = readline("Please enter correct name:");
    } else {
        $argv['patient']['name'] = $patient->name;
    }

    if (!empty($patient->errors["surname_errors"])) {
        $argv['patient']['surname'] = readline("Please enter correct surname: ");
    } else {
        $argv['patient']['surname'] = $patient->surname;
    }

    if (!empty($patient->errors["email_errors"])) {
        $argv['patient']['email'] = readline("Please enter correct email: ");
    } else {
        $argv['patient']['email'] = $patient->email;
    }

    if (!empty($patient->errors["phone_errors"])) {
        $argv['patient']['phone'] = readline("Please enter correct phone: ");
    } else {
        $argv['patient']['phone'] = $patient->phone;
    }

    if (!empty($patient->errors["nid_errors"])) {
        $argv['patient']['nid'] = readline("Please enter correct nid: ");
    } else {
        $argv['patient']['nid'] = $patient->nid;
    }

    if (!empty($patient->errors["date_errors"])) {
        $argv['patient']['date'] = readline("Please enter correct date (YYYY-MM-DD): ");
    } else {
        $argv['patient']['date'] = $patient->date;
    }

    if (!empty($patient->errors["time_errors"])) {
        $argv['patient']['time'] = readline("Please enter correct time (HH:MM): ");
    } else {
        $argv['patient']['time'] = $patient->time;
    }

    $router->dispatch("profile_update");
}

echo "\n\033[0;35m Appointment details\n\033[0m";
echo "\t1. (command: \"name\") Name: $patient->name\n";
echo "\t2. (command: \"surname\") Surname: $patient->surname\n";
echo "\t3. (command: \"email\") Email address: $patient->email\n";
echo "\t4. (command: \"phone\") Telephone number: $patient->phone\n";
echo "\t5. National ID number: $patient->nid\n";
echo "\t6. (command: \"date\") Date: $patient->date\n ";
echo "\t7. (command: \"time\") Time: $patient->time\n ";
