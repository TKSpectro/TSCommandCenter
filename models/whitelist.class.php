<?php
class Whitelist {

    public static function isWhitelisted(string $discordID) {
        return in_array($discordID, $GLOBALS['whitelist']);
    }
    public static function get() {
        return $GLOBALS['whitelist'];
    }

}