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
echo "\t5. (*) National ID number:$patient->nid\n";
echo "\t6. (command: \"date\") Date: $patient->date\n ";
echo "\t7. (command: \"time\") Time: $patient->time\n ";
echo "\t8. (command: \"profile_show\") Go to profile page:\n";
echo "\t9. (command: \"index\") Go to main menu: \n";
echo "\t10. (command: \"exit\") Exit the application:\n";
echo "\t10. (command: \"delete\") Delete the profile:\n";
echo "(*) ID value is uneditable, to change it , please delete the profile and create a new appointment\n\n";

$editing_commands = ["name", "surname", "email", "phone", "nid", "date", "time"];
$exit_commands = ["profile_show", "index", "exit", "delete"];

$command = readline("Please type a command: ");
while (!in_array($command, $editing_commands) || !in_array($command, $exit_commands)) {
    if (in_array($command, $exit_commands)) {
        $router->dispatch($command);
    } else {

        if ($command === "name") {
            $argv['patient']['name'] = readline("Change the name value: ");
        } else {
            $argv['patient']['name'] = $patient->name;
        }

        if ($command === "surname") {
            $argv['patient']['surname'] = readline("Change the surname value: ");
        } else {
            $argv['patient']['surname'] = $patient->surname;
        }

        if ($command === "email") {
            $argv['patient']['email'] = readline("Change the email value: ");
        } else {
            $argv['patient']['email'] = $patient->email;
        }

        if ($command === "phone") {
            $argv['patient']['phone'] = readline("Change the phone value: ");
        } else {
            $argv['patient']['phone'] = $patient->phone;
        }

        if ($command === "date") {
            $argv['patient']['date'] = readline("Change the date value: ");
        } else {
            $argv['patient']['date'] = $patient->date;
        }

        if ($command === "time") {
            $argv['patient']['time'] = readline("Change the time value: ");
        } else {
            $argv['patient']['time'] = $patient->time;
        }

        $router->dispatch("profile_update");
    }
    $command = readline("Please type a correct command: ");
}
