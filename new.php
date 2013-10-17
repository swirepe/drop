<?php
function clean($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once($_SERVER['DOCUMENT_ROOT']."/include/keymaker.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/include/memcache_init.php");
    $key = makeKey();
    $message= clean( $_POST["message"]);
    $fourteendays = 1209600;
    $success = $memcache->set($key, $message, MEMCACHE_COMPRESSED, $fourteendays);
    
    if($success) {
        // redirect to index with that key set
        header('Location: ' . "/index.php?key=" . $key, true, 301);
    }else{
        header("Location: /error.php", true, 201);
    }
    exit;
}   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Dropsy - New Message</title>
        <link rel="stylesheet" type="text/css" href="css" />
        <script type="text/javascript" src=""></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>

    
        <p>Your message</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <textarea rows="50" cols="100" name="message">&hellip;</textarea>
            <br />
            <input type="submit" value="Submit">
        </form>
        
        
    </body>
</html>
