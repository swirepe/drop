<?php

include_once($_SERVER['DOCUMENT_ROOT']."/include/memcache_init.php");

//get the q parameter from URL
$q=$_GET["key"];

//lookup all hints from array if length of q>0
if (strlen(htmlspecialchars($q)) > 0){
    $messageData = $memcache->get($q);
    
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($messageData === false){
  $response="No message found.";
}else{
  $response=$messageData;
}

//output the response
echo "<pre>" . htmlspecialchars($response) . "</pre>";
?>
