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
echo "\t4. Telephone number:\n";
echo "\t5. National ID number:\n";
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

// $argv['patient']['email'] = readline("Please enter your email address: ");
// $argv['patient']['phone'] = readline("Please enter your telephone number: ");
// $argv['patient']['national_id'] = readline("Please enter your national ID number: ");
// $argv['patient']['date'] = readline("Please enter preferred appointment date(YYYY-MM-DD): ");
// $argv['patient']['time'] = readline("Please enter preferred appointment time(HH-MM): ");

$router->dispatch("registration_create");
