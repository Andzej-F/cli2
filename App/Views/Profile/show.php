<?php

global $argv;
global $router;

if ($patient->validationErrors($patient->errors)) {
    echo "Errors line 7 show.php file\n";
    foreach ($patient->errors as $error_type => $errors) {
        print_r($errors);
        foreach ($errors as $key => $error) {
            echo "$error\n";
        }
    }
}

echo "\n\033[0;35m Your personal information\n\033[0m";
// echo "\t1. Name: " . $argv['patient']['name'] . "\n";
echo "\t1. Name: $patient->name \n";

// echo "\t2. Surname: " . $argv['patient']['surname'] . "\n";
echo "\t2. Surname: $patient->surname \n";

// echo "\t3. Email address: " . $argv['patient']['email'] . "\n";
echo "\t3. Email address: $patient->email \n";

echo "\t4. Telephone number: $patient->phone\n";
echo "\t5. National ID number: $patient->nid\n";
echo "\t6. Date:\n";
echo "\t7. Time:\n";
echo "\t8. Edit appointment details (type: \"edit\")\n";
echo "\t9. Go to the main menu (type: \"index\")\n";
echo "\t10. Exit the application (type: \"exit\")\n";
echo "\t10. Delete the profile: (type: \"delete\")\n";



$valid_commands = ["edit", "index", "exit", "delete"];

$command = readline("Please type the command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list ");
}

$router->dispatch($command);
