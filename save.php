<?
header("content-type: text/plain");
header("content-disposition: attachment; filename=message.txt");
header("cache-control: private");
header("pragma: private");

include_once($_SERVER['DOCUMENT_ROOT']."/include/memcache_init.php");

//get the q parameter from URL
$q=htmlspecialchars($_GET["key"]);

$fileData = "
 __________________
< No such message. >
 ------------------
        \   ^__^
         \  (^^)\_______
            (__)\       )\/\
                ||----w |
                ||     ||

";

if (strlen($q) > 0){
    $messageData = $memcache->get($q);
}

if ($messageData === false){
   // should probably do something here...
}else{
  $fileData=$messageData;
}


echo $fileData;
?>
