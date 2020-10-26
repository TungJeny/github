<?php
namespace Core;
use App\Config;

/**
 * Error and exception handler
 *
 * PHP version 7.0
 */

class Github_OAuth_Client{
    public $authorizeURL = "https://github.com/login/oauth/authorize";
    public $tokenURL = "https://github.com/login/oauth/access_token";
    public static $apiURLBase = "https://api.github.com/";
    public $clientID = config::CLIENT_ID;
    public $clientSecret = config::CLIENT_SECRET;
    public $redirectUri = config::REDIRECT_URL;
    
    /**
     * Construct object
     */
    public function __construct() {
        // code something
    }
    
    /**
     * Get the authorize URL
     *
     * @returns a string
     */
    public function getAuthorizeURL($state){
        return $this->authorizeURL . '?' . http_build_query([
            'client_id' => $this->clientID,
            'redirect_uri' => $this->redirectUri,
            'state' => $state,
            'scope' => 'user:email, repo, notifications, gist, read:packages, delete:packages, admin:org, repo:invite'
        ]);
    }
    
    
    /**
     * Exchange token and code for an access token
     */
    public function getAccessToken($state, $oauth_code){
        $token = $this->apiRequest($this->tokenURL . '?' . http_build_query([
            'client_id' => $this->clientID,
            'client_secret' => $this->clientSecret,
            'state' => $state,
            'code' => $oauth_code
        ]));
        
        return $token->access_token;
    }

    /**
     * Make an API request
     *
     * @return API results
     */
    public function apiRequest($access_token_url){
        $apiURL = filter_var($access_token_url, FILTER_VALIDATE_URL)?$access_token_url:$this->apiURLBase.'user?access_token='.$access_token_url;
        $context  = stream_context_create([
          'http' => [
            'user_agent' => 'GitHub OAuth Login',
            'header' => 'Accept: application/json'
          ]
        ]);
        $response = @file_get_contents($apiURL, false, $context);
        
        return $response ? json_decode($response) : $response;
    }


    /**
     * Make an API request
     *
     * @return API results
     */
    public static function apiRequestProfile($access_token_url){
        $apiURL = filter_var($access_token_url, FILTER_VALIDATE_URL)?$access_token_url:self::$apiURLBase.'user';
        
        // Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_USERAGENT => "token",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "access_token=".$access_token_url,
            CURLOPT_HTTPHEADER => array(
                "authorization: token ".$access_token_url,
                "content-type: application/vnd.github.v3+json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        }
       

        return $response ? json_decode($response) : $response;
    }

}