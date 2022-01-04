<?php
global $router;
global $argv;

echo "\033[0;35m \t\tLogin\n \033[0m";
echo "To proceed, type the command showed in the brackets\n";
echo "1. To login type a command \"med_login\" and press enter\n";
echo "2. Go to the main menu, type \"index\" \n";
echo "3. Exit the application, type \"exit\" \n";

$valid_commands = ["med_login", "index", "exit"];

$command = readline("Please type the command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list ");
}

if ($command === "med_login") {
    $argv['patient']['nid'] = readline("Please enter your national ID number: ");
    $router->dispatch("med_login_create");
} else {
    $router->dispatch($command);
}
