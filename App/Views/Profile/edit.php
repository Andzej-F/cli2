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
echo "\t1. (command: \"name\") Name: $patient->name\n";
echo "\t2. (command: \"surname\") Surname: $patient->surname\n";
echo "\t3. (command: \"email\") Email address: $patient->email\n";
echo "\t4. (command: \"phone\") Telephone number: \n";
echo "\t5. (command: \"nid\") National ID number:\n";
echo "\t6. (command: \"date\") Date:\n ";
echo "\t7. (command: \"time\") Time:\n ";
echo "\t8. (command: \"profile_show\") Go to profile page:\n";
echo "\t8. (command: \"index\") Go to main menu: \n";
echo "\t8. (command: \"exit\") Exit the application:\n";

/*
Please type a command from the list
name
Change the name value:
Stephen
Would you like to change any other values?(type "yes" or "no")
"no"
$router->dispatch("");

*/
// $editing_commands = ["name", "surname", "email", "phone", "nid", "date", "time", "no"];
// $exit_commands = ["profile_show", "index", "exit"];

$command = readline("Please type a command: ");
// $result == false;
// while ($result === false) {
//     if (in_array($command, $exit_commands)) {
//         $router->dispatch($command);
//         exit;
//         // TODO switch
//     } elseif ($command === "name") {
//         $argv['patient']['name'] = readline("Change the name value: ");
//         $router->dispatch("profile_update");
//         exit;
//     } else {
//     }
// }

switch ($command) {
    case "exit":
        $router->dispatch("exit");
        break;
    case "name":
        $router->dispatch("name");
        break;
    default:
        $command = readline("Please type a command form the list: ");
}

if ($command === "name") {
    $argv['patient']['name'] = readline("Change the name value: ");
    $router->dispatch("profile_update");
}

if ($command === "surname") {
    $argv['patient']['surname'] = readline("Change the surname value: ");
    $router->dispatch("profile_update");
}

if ($command === "email") {
    $argv['patient']['email'] = readline("Change the email value: ");
    $router->dispatch("profile_update");
}



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

// $router->dispatch("profile_update");
