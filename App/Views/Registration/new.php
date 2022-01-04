<?php

global $argv;
global $router;

echo "\n\033[0;35m Please provide the following information about yourself\n\033[0m";
echo "\t1. Name: \n";
echo "\t2. Surname: \n";
echo "\t3. Email address:\n";
echo "\t4. Telephone number:\n";
echo "\t5. National ID number:\n";
echo "\t6. Preferred date (YYYY-MM-DD):\n";
echo "\t7. Preferred time (HH:MM, working hours 08-00 till 17-00):\n";
echo "\t8. To provide the above information about yourself (type: \"provide\")\n";
echo "\t9. Go to the main menu (type: \"index\")\n";
echo "\t10. Exit the application (type: \"exit\")\n\n";

$valid_commands = ["provide", "index", "exit"];

$command = readline("Please type a command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type a correct command: ");
}

if ($command === "provide") {
    $argv['patient']['name'] = readline("Please enter your name: ");
    $argv['patient']['surname'] = readline("Please enter your surname: ");
    $argv['patient']['email'] = readline("Please enter your email address: ");
    $argv['patient']['phone'] = readline("Please enter your phone number: ");
    $argv['patient']['nid'] = readline("Please enter your national ID number: ");
    $argv['patient']['date'] = readline("Please enter preferred appointment date (YYYY-MM-DD): ");
    $argv['patient']['time'] = readline("Please enter preferred visit time format (HH:MM): ");
    $router->dispatch("registration_create");
} else {
    $router->dispatch($command);
}
