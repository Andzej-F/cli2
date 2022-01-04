<?php

global $argv;
global $router;

echo "\n\033[0;35m Your personal information\n\033[0m";
echo "\t1. Employee ID number: $personnel->med_id\n";
echo "\t2. View appointments (command: \"dates\")\n";
echo "\t3. Go to the main menu (command: \"index\")\n";
echo "\t4. Exit the application (command: \"exit\")\n";


$valid_commands = ["index", "exit", "dates"];

$command = readline("Please type the command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list ");
}

$router->dispatch($command);
