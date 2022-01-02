<?php
global $router;

echo "\033[0;35m Registration for Vaccine Form\n \033[0m";
echo "To proceed, type the command showed in the brackets the option\n";
echo "1. Register for appointment (\"reg\")\n";
echo "2. Patient Login (\"login\")\n";
echo "3. Medical Personnel Login (\"med_login\") \n";
echo "4. Exit the application (\"exit\")\n";

$valid_commands = ["reg", "login", "med_login", "exit"];

$command = readline("Please type the command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list ");
}

$router->dispatch($command);
