<?php
class User {
    private static $_instance = null;
    private $_userID,
            $_accessToken,
            $_loggedIn = false;

    private function __construct(string $discordID = "") {
        $user = $this->findByDiscordID($discordID);
    }

    public function findByDiscordID(string $discordID){
        
    }

    public function login(string $code) {
        var_dump($code);

        $token = Discord::request(Config::get("token_url"), array(
            "grant_type" => "authorization_code",
            'client_id' => Config::get("discord_client_id"),
            'client_secret' => Config::get("discord_client_secret"),
            'redirect_uri' => Config::get("redirect_url"),
            'code' => $code
        ));

        $accessToken = $token->access_token;
        $expiry = $token->expires_in;       // 7 days

        // Write accesstoken as user cookie with matching expiry
        Cookie::put(Config::get("cookie_name_disc_accessToken"), $accessToken, $expiry);

        $this->_loggedIn = true;
    }

    public function isLoggedIn(){
        return $this->_loggedIn;
    }
    public function logout(){
        Cookie::put(Config::get("cookie_name_disc_accessToken"), " ", -1);
        session_destroy();
        $this->_loggedIn = false;
    }

    public static function getInstance(string $lang = '') {
        if (!isset(self::$_instance)) {
            self::$_instance = new User();

            $accessToken = Cookie::get(Config::get("cookie_name_disc_accessToken"));
            if(isset($accessToken)) {
                self::$_instance->_accessToken = $accessToken;
                self::$_instance->_loggedIn = true;
            }
        }
        return self::$_instance;
    }
}
?>