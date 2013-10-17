<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/include/_memcache_servers.php")
    
    $memcache = new Memcache();
    foreach($MEMCACHE_SERVERS as $server){
        $memcache->addServer ( $server );
    }
?>
