<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, name FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertUser($gitUserData)
    {
        $db = static::getDB();
        $sql = "INSERT INTO users (oauth_provider, oauth_uid, name, username, email, location, picture, link) VALUES (:oauth_provider, :oauth_uid, :name, :username, :email, :location, :picture, :link)";
        $stmt= $db->prepare($sql);
        $stmt->execute($gitUserData);
    }
    
}
