<?php

namespace App\Models;

use PDO;

/**
 * Patient model
 * 
 * PHP version 8.0.7
 */
class Personnel extends \Core\Model
{
    // /**
    //  * Error messages
    //  * 
    //  * @var array
    //  */
    // public $errors = [
    //     "med_id_errors" => []
    // ];

    // /**
    //  * Class constructor
    //  * 
    //  * @param array $data Initial property values
    //  * 
    //  * @return void
    //  */

    // public function __construct($data = [])
    // {
    //     foreach ($data as $key => $value) {
    //         $this->$key = $value;
    //     }
    // }

    /**
     * Find a personnel model by medical ID
     * 
     * @param string $med_id medical ID
     * 
     * @return mixed Personnel object if found, false otherwise
     */
    public static function findByMedID($med_id)
    {
        $sql = 'SELECT * FROM `personnel` WHERE med_id = :med_id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':med_id', $med_id, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }
}
