<?php

global $argv;
global $router;

echo "\033[0;35m\n\t\t\tRegistered Appointment Dates\n \033[0m";
echo "\t1. Go to the main menu (command: \"index\")\n";
echo "\t2. Exit the application (command: \"exit\")\n";
echo "\t3. Type the date (YYY-MM-DD) for the details (e.g command: \"2022-06-22\")\n";

if (!empty($dates)) {
    $count = 0;
    echo "\t\t\t\tAppointment Dates:\n";
    foreach ($dates as $date) {
        echo "\t$date\t";
        $count++;
        if ($count % 3 === 0) {
            echo "\n";
        }
    }
    echo "\n\n";
} else {
    echo "No appointments available";
}

$valid_commands = ["index", "exit"];

$command = readline("Please type the command or date value from the list: ");
while (!in_array($command, $valid_commands)) {
    if (preg_match('/^\d{4}-[0,1]\d-[0-3]\d$/', $command)) {
        $argv['date'] = $command;
        $router->dispatch('details');
    }
    $command = readline("Please type the correct command or date value from the list: ");
}

$router->dispatch($command);
