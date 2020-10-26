<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Repo extends \Core\Model
{
    
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM repo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addRepo($data_repo)
    {
        $db = static::getDB();
        $sql = "INSERT INTO repo (id_repo, name, full_name, owner_id, owner_url, owner_name, html_url, description, forks_url, stargazers_url, downloads_url, created_at, updated_at, clone_url, stargazers_count) VALUES (:id_repo, :name, :full_name, :owner_id, :owner_url, :owner_name, :html_url, :description, :forks_url, :stargazers_url, :downloads_url, :created_at, :updated_at, :clone_url, :stargazers_count)";
        $stmt= $db->prepare($sql);
        $stmt->execute($data_repo);
    }

    public static function get($id_repo)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM repo WHERE id_repo =' .$id_repo);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function addRepoForks($data_forks) {
        $db = static::getDB();
        $sql = "INSERT INTO user_repo (id_user, id_repo, repo_url) VALUES (:id_user, :id_repo, :repo_url)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data_forks);
    }

    public static function getAllRepo($id_user)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT a.*, b.id_user as id_user, b.repo_url as repo_url FROM repo as a left join (SELECT * FROM `user_repo` WHERE id_user = '.$id_user.') as b on a.id_repo = b.id_repo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRepoCheck($id_user, $id_repo) {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM user_repo where id_user=' .$id_user .' AND id_repo='.$id_repo);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}