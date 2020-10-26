<?php
namespace App\Controllers;

use \Core\View;
use \Core\Github_OAuth_Client;
use \App\Config;

/**
 * Home controller
 *
 * PHP version 7.0
 */

class AdminController extends \Core\Controller {

    public function __construct() {
        if (!isset($_SESSION['access_token'])) {
            header('Location:./');
        }
    }

    public function indexAction()
    {
        //dd($_SESSION['access_token']);
        
        if (isset($_SESSION['access_token'])) {
            $accessToken = $_SESSION['access_token'];
            
            if(isset($accessToken)){
                $gitClient = new Github_OAuth_Client();
                // Get the user profile info from Github
                $gitUser = $gitClient->apiRequestProfile($accessToken);
                if(!empty($gitUser)){
                    // User profile data
                    $avatar = !empty($gitUser->avatar_url) ? $gitUser->avatar_url : '';
                    $usernameGithub = !empty($gitUser->login) ? $gitUser->login : '';

                    if (empty($_SESSION['oauth_uid'])) {
                        $_SESSION['oauth_uid'] = !empty($gitUser->id) ? $gitUser->id : '';
                    }
                    
                    $user = [
                        'oauth_provider' => 'github',
                        'oauth_uid' => !empty($gitUser->id) ? $gitUser->id : '',
                        'name' => !empty($gitUser->name) ? $gitUser->name : '',
                        'email' => !empty($gitUser->email) ? $gitUser->email : '',
                        'link' => !empty($gitUser->html_url) ? $gitUser->html_url : '',
                        'public_repos' => !empty($gitUser->public_repos) ? $gitUser->public_repos : '',
                        'public_gists' => !empty($gitUser->public_gists) ? $gitUser->public_gists : '',
                        'followers' => !empty($gitUser->followers) ? $gitUser->followers : '',
                        'following' => !empty($gitUser->following) ? $gitUser->following : '',                    ];
                    
                        return View::renderTemplate('Admin/index.html', [
                            'user' => $user,
                            'avatar' => $avatar,
                            'usernameGithub' => $usernameGithub,
                            "access_token" => $accessToken,
                        ]);
                    
                }else{
                    return View::renderTemplate('Admin/index.html', [
                        'user' => 'not found'
                    ]);
                }
                
            }
        }

    }

}