<?php

namespace App\Models;

use PDO;

/**
 * Patient model
 * 
 * PHP version 8.0.7
 */
class Patient extends \Core\Model
{
    /**
     * Error messages
     * 
     * @var array
     */
    public $errors = [
        "name_errors" => [],
        "surname_errors" => []
    ];

    /**
     * Class constructor
     * 
     * @param array $data Initial property values
     * 
     * @return void
     */

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    // /**
    //  * Display the list of authors available in database
    //  * 
    //  * @return array Return array of authors
    //  */
    // public static function getAll()
    // {
    //     $sql = 'SELECT * FROM `authors` WHERE 1
    //             ORDER BY `surname`';

    //     $db = static::getDB();

    //     $stmt = $db->prepare($sql);
    //     $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
    //     $stmt->execute();

    //     $result = $stmt->fetchAll();

    //     return $result;
    // }

    /**
     * Save the patient model with the current property values
     * 
     * @return boolean Return true on success or false on failure.
     */
    public function save()
    {
        $this->validate();

        if ($this->validationErrors($this->errors) === false) {

            $sql = 'INSERT INTO `patients`(`name`, `surname`, `email`)
                    VALUES (:name, :surname, :email)';

            $db = static::getDB();

            $stmt = $db->prepare($sql);

            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);

            // "PDOStatement::execute" method returns true on success or false on failure.
            return $stmt->execute();
        }

        return false;
    }

    /**
     * Checks if two-dimesional array has errors
     * 
     * @return boolean Return true if array has errors, false otherwise.
     */
    public function validationErrors($errors)
    {
        foreach ($errors as $error_type => $error_array) {
            if (!empty($error_array)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validate current property values, adding validation error messages
     * to the errors array property
     * 
     * @return void
     */
    public function validate()
    {
        // Name
        $this->name = trim($this->name);

        if ($this->name == '') {
            $this->errors["name_errors"][] = "\033[01;31m Error: Name is required \033[0m";
        }

        if (!preg_match('/^[a-zA-z ,.!().?";\'-]+$/i', $this->name)) {
            $this->errors["name_errors"][] = "\033[01;31m Error: Name contains not valid characters \033[0m";
        }

        if ($this->name !== ucwords($this->name, " \t\r\n\f\v")) {
            $this->errors["name_errors"][] = "\033[01;31m Error: Name must begin with a capital letter \033[0m";
        }

        if (mb_strlen($this->name) > 64) {
            $this->errors["name_errors"][] = "\033[01;31m Error: Name is too long \033[0m";
        }

        // Surname
        $this->surname = trim($this->surname);

        if ($this->surname == "") {
            $this->errors["surname_errors"][] = "\033[01;31m Error: Surname is required \033[0m";
        }

        if (!preg_match('/^[a-zA-z ,.!().?";\'-]+$/i', $this->surname)) {
            $this->errors["surname_errors"][] = "\033[01;31m Error: Surname contains not valid characters \033[0m";
        }

        if ($this->surname !== ucwords($this->surname, " \t\r\n\f\v")) {
            $this->errors["surname_errors"][] = "\033[01;31m Error: Surname must begin with a capital letter \033[0m";
        }

        if (mb_strlen($this->surname) > 64) {
            $this->errors["surname_errors"][] = "\033[01;31m Error: Surname is too long \033[0m";
        }

        // Email
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors["email_errors"][] = "\033[01;31m Error: Not valid email address\033[0m";
        }
    }

    /**
     * Find a patient model by email
     * 
     * @param string $patient_id The patinet ID
     * 
     * @return mixed Patient object if found, false otherwise
     */
    public static function findByEmail($email)
    {
        $sql = 'SELECT * FROM `patients` WHERE email = :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Update the patient's profile
     * 
     * @param array $data Data from the edit profile form
     * 
     * @return boolean True if the data was updated, false otherwise
     */
    public function updateProfile()
    {
        // Assign the values from the form to properties of the patient
        // echo "kaip cia atrodo data\n";
        // print_r($data);

        // echo $this->name . "\n";
        // echo $this->surname . "\n";
        // echo $this->email . "\n";
        // exit;

        // $this->name = $data['name'];
        // $this->surname = $data['surname'];
        // $this->email = $data['email'];

        $this->validate();

        if ($this->validationErrors($this->errors) === false) {

            $sql = 'UPDATE `patients`
                    SET `name` = :name,
                        `surname` = :surname,
                        `email` = :email
                    WHERE `email` = :email';


            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }

    /**
     * Delete the patient's profile and appointment details
     *  
     * @return boolean True if the data was deleted, false otherwise
     */
    public function deletePatient($email)
    {
        $sql = 'DELETE FROM `patients`
                    WHERE `email` = :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':email', $this->email, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
