<?php

global $argv;
global $router;

if (!empty($patient->errors)) {
    echo "Errors\n";
    foreach ($patient->errors as $error_type => $errors) {
        foreach ($errors as $key => $error) {
            echo "$error\n";
        }
    }
}

echo "\n\033[0;35m Appointment details\n\033[0m";
echo "\t1. Name: $patient->name\n";
echo "\t2. Surname: $patient->surname\n";
echo "\t3. Email address: $patient->surname\n";
echo "\t4. Telephone number: $patient->phone\n";
echo "\t5. National ID number: $patient->nid\n";
echo "\t6. Date:\n";
echo "\t7. Time:\n";

if (!empty($patient->errors["name_errors"])) {
    $argv['patient']['name'] = readline("Please enter correct name: ");
}

if (!empty($patient->errors["surname_errors"])) {
    $argv['patient']['surname'] = readline("Please enter correct surname: ");
}

if (!empty($patient->errors["email_errors"])) {
    $argv['patient']['email'] = readline("Please enter correct email: ");
}

if (!empty($patient->errors["phone_errors"])) {
    $argv['patient']['phone'] = readline("Please enter correct phone: ");
}

if (!empty($patient->errors["nid_errors"])) {
    $argv['patient']['nid'] = readline("Please enter correct nid: ");
}

// $argv['patient']['date'] = readline("Please enter preferred appointment date(YYYY-MM-DD): ");
// $argv['patient']['time'] = readline("Please enter preferred appointment time(HH-MM): ");

$router->dispatch("registration_create");
