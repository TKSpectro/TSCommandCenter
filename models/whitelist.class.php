<?php
class Whitelist {

    public static function isWhitelisted(string $discordID) {
        return in_array($discordID, $GLOBALS['whitelist']);
    }

}