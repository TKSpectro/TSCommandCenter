<?php
class Discord {
    public static function request($url, $post=FALSE, $headers=array()) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      
        $response = curl_exec($ch);
      
        if($post) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }
      
        $headers[] = 'Accept: application/json';

        if(Cookie::get(Config::get('cookie_name_disc_accessToken'))) {
            $headers[] = 'Authorization: Bearer ' . Cookie::get(Config::get('cookie_name_disc_accessToken'));
        } else if(Session::get(Config::get('cookie_name_disc_accessToken'))) {
          $headers[] = 'Authorization: Bearer ' . Session::get(Config::get('cookie_name_disc_accessToken'));
        }
      
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
        $response = curl_exec($ch);
        return json_decode($response);
      }
}
?>