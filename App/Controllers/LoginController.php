<?php
namespace App\Controllers;

use \Core\View;
use \Core\Github_OAuth_Client;
use App\Config;
use PDO;

class LoginController extends \Core\Controller 
{
    
    public function __construct()
    {
        
    }
    /**
     * action login github
     *
     */
    public function LoginAction(){

        /** @var Session 
         * check if exist session login redirect to admin page
        */
        if(isset($_SESSION['access_token'])){
            header('Location: ./admin/home');
            exit;
        }
        
        $gitClient = new Github_OAuth_Client();

        if (isset($_GET['code'])) {
            // Verify the state matches the stored state
            if(!$_GET['state'] || $_SESSION['state'] != $_GET['state']) {
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            // Exchange the auth code for a token
            $accessToken = $gitClient->getAccessToken($_GET['state'], $_GET['code']);
            $_SESSION['access_token'] = $accessToken;
            // insert user into database

            if(isset($accessToken)){
                $gitUser = $gitClient->apiRequestProfile($accessToken);
                if(!empty($gitUser)){ 
                    
                    $gitUserData = array();
                    $gitUserData['oauth_provider'] = 'github';
                    $gitUserData['oauth_uid'] = !empty($gitUser->id)?$gitUser->id:'';
                    $gitUserData['name'] = !empty($gitUser->name)?$gitUser->name:'';
                    $gitUserData['username'] = !empty($gitUser->login)?$gitUser->login:'';
                    $gitUserData['email'] = !empty($gitUser->email)?$gitUser->email:'';
                    $gitUserData['location'] = !empty($gitUser->location)?$gitUser->location:'';
                    $gitUserData['picture'] = !empty($gitUser->avatar_url)?$gitUser->avatar_url:'';
                    $gitUserData['link'] = !empty($gitUser->html_url)?$gitUser->html_url:'';
                    
                    //\App\Models\User::insertUser($gitUserData);
                }
            }

            header('Location: admin/home');
            exit;
        } else {
            // Generate a random hash and store in the session for security
            $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);
            // Remove access token from the session
            unset($_SESSION['access_token']);
            // Get the URL to authorize
            $loginURL = $gitClient->getAuthorizeURL($_SESSION['state']);
            return View::renderTemplate('Login/index.html', [
                'output' => $loginURL
            ]);
        }
    }
    
    /**
     * function logout 
     * unset all session
     */
    public function LogoutAction(){
        // Remove access token and state from session
        unset($_SESSION['access_token']);
        unset($_SESSION['state']);
        unset($_SESSION['userData']);
        unset($_SESSION['number_repository']);
        header("Location:index.php");
    }

}