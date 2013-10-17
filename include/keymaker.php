<?php
function makeKey() {
    $fp = fsockopen("localhost", 32774, $errno, $errstr, 30);
    $key = fgets($fp, 4096);
    fclose($fp);
    return $key;
}

?>
