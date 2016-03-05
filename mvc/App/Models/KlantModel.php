<?php
namespace myMvc\App\Models;

use myMvc\System\Database;

class UserModel {

    private $Database;

    public function __construct () {

    }

    /**
     * [getArray description]
     * @return [type] [description]
     */
    public function fetchAll () {

        # Prepare and execute query
        $sql = "SELECT * FROM klant";
        $stmt = Database::conn()->prepare($sql);
        $stmt->execute();

        # Fetch all records into an array
        $collection = $stmt->fetchAll();

        # Return the collection
        return $collection;
    }

    /**
     * [getRow description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function fetchOne ($id) {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = Database::conn()->prepare($sql);
        $stmt->execute(array('id' => $id));

        # Fetch all records into an array
        $row = $stmt->fetch();

        # Return the collection
        return $row;
    }

    /**
     * [insert description]
     * @return [type] [description]
     */
    public function insert () {

        $input = $_POST;

        $sql 	= "INSERT INTO user (" . implode(', ', array_keys($input)) . ") VALUES (:" . implode(', :', array_keys($input)) . ")";
        $stmt 	= Database::conn()->prepare($sql);
        $result = $stmt->execute($input);

        # Return the inserted id
        if($result) {
            return  Database::conn()->lastInsertId();
        } else {
            return false;
        }
    }

    /**
     * [update description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function update ($id) {

        $input = $_POST;
        $input['id'] = $id;

        # Build prepared update values
        $update = implode(', ', array_map(function ($v, $k) { return sprintf("%s = :%s", $k, $k); }, $input, array_keys($input)));

        # Prepare query
        $sql 	= "UPDATE user SET " . $update . " WHERE id = :id";
        $stmt 	= Database::conn()->prepare($sql);
        $result = $stmt->execute($input);

        # Execute query
        if($result) {
            return true;
        } else {
            return false;
        }
    }
}