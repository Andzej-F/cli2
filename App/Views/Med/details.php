<?php

global $argv;
global $router;

echo "\033[0;35m\n \t\t\tAppointment Details\n \033[0m";
echo "\t1. Go to the employee menu (command: \"med_menu\")\n";
echo "\t2. Go to the main menu (command: \"index\")\n";
echo "\t3. Exit the application (command: \"exit\")\n";

echo "==================================================================================================\n";
echo "\t\t\t\tUsers registered for the $date\n";
echo "==================================================================================================\n";
echo "Time\t Name\t Surname\t Phone\t ID number \tEmail\n";

foreach ($details as $row) {
    echo "$row[time]\t $row[name]\t $row[surname]\t $row[phone]\t $row[nid]\t $row[email]\n";
}

$valid_commands = ["index", "exit", "med_menu"];

$command = readline("Please type the command from the list: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list: ");
}

$router->dispatch($command);
