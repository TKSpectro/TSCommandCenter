<?php
function strposa($haystack, $needles=array()) {
    $chr = array();
    foreach($needles as $needle) {
        $res = strpos($haystack, $needle);
        if ($res !== false) $chr[$needle] = $res;
    }
    if(empty($chr)) return false;
    return min($chr);
}