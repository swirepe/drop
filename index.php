<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Dropsy.onion</title>
        <link rel="stylesheet" type="text/css" href="css" />
        <script type="text/javascript" src="/include/showMessage.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
<body>

    <p><b>Enter the message key below.</b></p>
    <form> 
        Message key: <input type="text" size="100" onkeyup="showMessage(this.value)"
            <?php
                // see if we have to fill this in
                $q=$_GET["key"];
                
                if( strlen(htmlspecialchars($q)) > 0 ) {
                    echo 'value="' . $q . '"';
                }
            ?>   
        > <!-- end of input bar -->
    
    </form>
    <p>Message</p>
    
    
    <div id="messageTxt">&hellip;</div>
    
    
    <p><a href="/new.php">Or make a new message.</a></p>
    <?php
        $q=$_GET["key"];
        echo '<script type="text/javascript">';
        echo 'showMessage(' . $q . ');';
        echo '</script>';
    ?>
</body>


</html>
