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
class HomeController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        if (isset($_SESSION['access_token'])) {
            $accessToken = $_SESSION['access_token'];
            
            if(isset($accessToken)){
                $gitClient = new Github_OAuth_Client();
                // Get the user profile info from Github
                $gitUser = $gitClient->apiRequestProfile($accessToken);
                if(!empty($gitUser)){
                    // User profile data
                    $gitUserData = array();
                    $gitUserData['oauth_provider'] = 'github';
                    $gitUserData['oauth_uid'] = !empty($gitUser->id)?$gitUser->id:'';
                    $gitUserData['name'] = !empty($gitUser->name)?$gitUser->name:'';
                    $gitUserData['username'] = !empty($gitUser->login)?$gitUser->login:'';
                    $gitUserData['email'] = !empty($gitUser->email)?$gitUser->email:'';
                    $gitUserData['location'] = !empty($gitUser->location)?$gitUser->location:'';
                    $gitUserData['picture'] = !empty($gitUser->avatar_url)?$gitUser->avatar_url:'';
                    $gitUserData['link'] = !empty($gitUser->html_url)?$gitUser->html_url:'';
                    
                    // Insert or update user data to the database
                    // $userData = $user->checkUser($gitUserData);
                    
                    // Put user data into the session
                    //$_SESSION['userData'] = $userData;
                    //dd($userData);
                    // Render Github profile data
                    // $output  = '<h2>Github Profile Details</h2>';
                    // $output .= '<img src="'.$userData['picture'].'" />';
                    // $output .= '<p>ID: '.$userData['oauth_uid'].'</p>';
                    // $output .= '<p>Name: '.$userData['name'].'</p>';
                    // $output .= '<p>Login Username: '.$userData['username'].'</p>';
                    // $output .= '<p>Email: '.$userData['email'].'</p>';
                    // $output .= '<p>Location: '.$userData['location'].'</p>';
                    // $output .= '<p>Profile Link :  <a href="'.$userData['link'].'" target="_blank">Click to visit GitHub page</a></p>';
                    // $output .= '<p>Logout from <a href="logout.php">GitHub</a></p>'; 
                }else{
                    $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
                }
                
            }
        }
        return View::renderTemplate('Home/index.html');
    }
    
}
