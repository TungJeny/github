<?php
namespace App\Controllers;

use \Core\View;
use \Core\Github_OAuth_Client;
use \App\Config;
use \Core\CallApi;
use PDO;

/**
 * Home controller
 *
 * PHP version 7.0
 */

class RepoController extends \Core\Controller {

    public function __construct() {
        if (!isset($_SESSION['access_token'])) {
            header('Location:./');
        }
    }

    public function getRepo()
    {
        View::renderTemplate('Admin/repo.html');
    }

    public function postRepo()
    {
        if (isset($_POST['username'])) {        

            $username = trim($_POST['username']);

            if (!isset($_SESSION['access_token'])) {
                View::renderTemplate('Admin/repo.html', [
                    "data" => "sorry we not found access_token"
                ]);
            }

            if (isset($_POST['number_page'])) {
                $number_page = $_POST['number_page'];
            } else {
                $number_page = 0;
            }
            
            $apiURLInfoUser = "https://api.github.com/users/".$username;

            $apiURLRepo = "https://api.github.com/users/".$username."/repos";

            $data_info = CallApi::getApiGithub($apiURLInfoUser, $_SESSION['access_token']);
           //dd($data_info);
            if (empty($data_info) || property_exists($data_info, 'message')) {
                return View::renderTemplate('Admin/repo.html', [
                    "username" => $username,
                    "message"  => "Not found"
                ]);
            }

            $number_repository = !empty($data_info->public_repos) ? $data_info->public_repos : '';
            

            $data = CallApi::getApiGithub($apiURLRepo, $_SESSION['access_token']);        
            
            $total_data = count($data);

            return View::renderTemplate('Admin/repo.html', [
                "data" => $data,
                "username" => $username,
                "number_page" =>  $number_page,
                "number_repository" => $number_repository,
                "total_data" => $total_data,
            ]);
        }
    }

    public function cloneRepoAction ()
    {
        if (!empty($_POST['id'])) {
            $id_repo = $_POST['id'];
            if (!isset($_SESSION['access_token'])) {
                View::renderTemplate('Admin/repo.html', [
                    "data" => "sorry we not found access_token"
                ]);
            };

            $apiURLRepo = "https://api.github.com/repositories/".$id_repo;
            $data_repo = CallApi::getApiGithub($apiURLRepo, $_SESSION['access_token']);
            //dd($data_repo, $apiURLRepo);
            if (empty($data_repo) || property_exists($data_repo, 'message')){ 
                return View::renderTemplate('Admin/repo.html', [
                    "message"  => "id repo not found"
                ]);
            }

            if (!empty($data_repo)) {

                $check = \App\Models\Repo::get($data_repo->id);

                if (!empty($check)) {
                    return json_encode(['message' => 'repo exist']);
                }

                $data = [
                    "id_repo" => $data_repo->id,
                    "name" => $data_repo->name,
                    "full_name" => $data_repo->full_name,
                    "owner_id" => $data_repo->owner->id,
                    "owner_url" => $data_repo->owner->url,
                    "owner_name" => $data_repo->owner->login,
                    "html_url" => $data_repo->html_url,
                    "description" => $data_repo->description,
                    "forks_url" => $data_repo->forks_url,
                    "stargazers_url" => $data_repo->stargazers_url,
                    "downloads_url" => $data_repo->downloads_url,
                    "created_at" => $data_repo->created_at,
                    "updated_at" => $data_repo->updated_at,
                    "clone_url" => $data_repo->clone_url,
                    "stargazers_count" => $data_repo->stargazers_count
                ];
                \App\Models\Repo::addRepo($data);
                return json_encode(['message' => 'success']); 
            }
            return json_encode(['message' => 'error']);
        }
    }

    public function listRepoAction() 
    {
        
        if (isset($_SESSION['oauth_uid'])) {
            $data = \App\Models\Repo::getAllRepo($_SESSION['oauth_uid']);
        }else {
            $data = [];
        }
        
        return View::renderTemplate('Admin/repo_list.html', [
            "data"  => $data
        ]);
    }

    public function forksRepo()
    {
        if (!empty($_POST['url_fork'])) {
            $apiURLForks = trim($_POST['url_fork']);

            if (!isset($_SESSION['access_token'])) {
                dd("khong co token");
            };
            $data_forks = CallApi::postApiGithub($apiURLForks, $_SESSION['access_token']);

            $data_forks_save = [
                "id_user" => $data_forks->owner->id,
                "id_repo" => $data_forks->parent->id,
                "repo_url" => $data_forks->html_url,
            ];
            
            $check_data = \App\Models\Repo::getRepoCheck($data_forks->owner->id, $data_forks->parent->id);
            
            if (!empty($check_data)) {
                return;
            } else {
                \App\Models\Repo::addRepoForks($data_forks_save);
            }

            header('Location: admin/repo/data');
            // return json_encode(['message' => 'success']); 
            // https://api.github.com/repos/Bretho/iptvlisttest/forks
        }
    }

}
