<?php

// sss

// $errors = [
//     "name_errors" => [],
//     "surname_errors" => []
// ];

// // if (empty($errors)) {
// //     echo "Masyvas tuscias";
// // } else {
// //     echo "Masyvas ne tuscias";
// // }

// foreach ($errors as $error_type => $error_array) {
//     if (!empty($error_array)) {
//         return false;
//     }

//     return true;
// }

$array = ["surname_errors" =>
[0 => "Error: Surname must begin with a capital letter"]];

if (empty($array["surname_errors"])) {
    echo "Masyvas tuscias";
} else {
    echo "Masyvas ne tuscias";
}

echo '<pre>';
print_r($array["surname_errors"]);
echo '</pre>';
