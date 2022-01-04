<?php
global $router;
global $argv;

echo "\033[0;35m \t\tLogin\n \033[0m";
echo "To proceed, type the command showed in the brackets\n";
echo "1. For employee login type a command \"login\" and press enter\n";
echo "2. Go to the main menu (command: \"index\") \n";
echo "3. Exit the application (command: \"exit\") \n";

$valid_commands = ["login", "index", "exit"];

$command = readline("Please type the command: ");
while (!in_array($command, $valid_commands)) {
    $command = readline("Please type the command from the list ");
}

if ($command === "login") {
    $argv['med_id'] = readline("Please enter your employer ID: ");
    $router->dispatch("med_menu");
} else {
    $router->dispatch($command);
}
