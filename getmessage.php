<?php

include_once($_SERVER['DOCUMENT_ROOT']."/include/memcache_init.php");

//get the q parameter from URL
$q=htmlspecialchars($_GET["key"]);


if (strlen($q) > 0){
    $messageData = $memcache->get($q);
    
}

if ($messageData === false){
  $response="No message found.";
}else{
  $response=$messageData;
}

//output the response
echo "<pre>" . htmlspecialchars($response) . "</pre>";
?>
