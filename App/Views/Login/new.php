<?php
global $router;
global $argv;

echo "\033[0;35m \t\tLogin\n \033[0m";
echo "To proceed, type the command showed in the brackets\n";
echo "1. To login with your email address type a command \"email\" and press enter\n";
echo "2. Go to the main menu, type \"menu\" \n";
echo "3. Exit the application, type\"exit\" \n";

$command = readline("Please type the command: ");

if ($command === "email") {
    $argv['patient']['email'] = readline("Please enter your email address: ");
    $router->dispatch("login_create");
}
