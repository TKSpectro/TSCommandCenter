<?php
class User {
    private static $_instance = null;
    private $_userID,
            $_accessToken,
            $_expiry,
            $_data,
            $_loggedIn = false;

    private function __construct() {
        
    }

    private function load(string $redirectURL){
        $result = Discord::request(Config::get('api_endpoint').'/users/@me', false, array(
            'client_id' => Config::get("discord_client_id"),
            'client_secret' => Config::get("discord_client_secret"),
            'authorization' => $this->_accessToken,
            'redirect_uri' => $redirectURL
        ));

        $this->_data = $result;
        return $this->_data;
    }

    private function clearCookies(){
        Cookie::put(Config::get("cookie_name_disc_accessToken"), -1, -1);
    }

    public function findByDiscordID(string $discordID) {}

    public function login(string $code, string $redirectURL) {
        $token = Discord::request(Config::get("token_url"), array(
            "grant_type" => "authorization_code",
            'client_id' => Config::get("discord_client_id"),
            'client_secret' => Config::get("discord_client_secret"),
            'redirect_uri' => $redirectURL,
            'code' => $code
        ));

        // Only login if access token has been returned
        if(property_exists($token, 'access_token')) {
            $accessToken = $token->access_token;
            $this->_accessToken = $accessToken;
            $expiry = $token->expires_in;       // 7 days
            $this->_expiry = $expiry;

            // Required in order to perform api calls even if not registered as logged in by system (needed for user id checking)
            Session::put(Config::get('cookie_name_disc_accessToken'), $accessToken);

            if($this->load($redirectURL)) {
                if(Whitelist::isWhitelisted($this->_data->id)) {
                    // Write accesstoken as user cookie with matching expiry
                    Cookie::put(Config::get("cookie_name_disc_accessToken"), $this->_accessToken, $expiry);
                    $this->_loggedIn = true;
                }
            }
        }
    }

    public function isLoggedIn(){
        return $this->_loggedIn;
    }
    public function data(){
        return $this->_data;
    }
    public function logout(){
        $this->clearCookies();
        session_destroy();
        $this->_loggedIn = false;
    }

    public function isWhitelisted(){
        return Whitelist::isWhitelisted($this->_data->id);
    }

    public static function getInstance(string $redirectURL = '') {
        if (!isset(self::$_instance)) {
            self::$_instance = new User();

            $accessToken = Cookie::get(Config::get("cookie_name_disc_accessToken"));
            if(isset($accessToken)) {
                self::$_instance->_accessToken = $accessToken;

                if(self::$_instance->load($redirectURL)) {
                    self::$_instance->_loggedIn = true;
                }
            }
        }

        return self::$_instance;
    }

    public function hasPermission(string $permission) {
        // Deny permissions if removed or not on whitelist
        if(!$this->isWhitelisted()) {
            $this->logout();
            return false;
        }

        

        return true;
    }
}
?>