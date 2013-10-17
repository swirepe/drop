<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Drop.onion</title>
<style type="text/css">
#messageTxt {
    width: 600px;
    min-height:300px;
    border: 1px solid #d4d4d4;
    background-color: #F6F4F0;
    color: #444444;
    padding: 5px;
    margin: 0;
    margin-left: 50px;
}

.key {
    font-weight:bold;
    font-size:130%;
    color:#33FF33;
}

</style>
        <script type="text/javascript" src="/include/showMessage.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
<body>
    <h1>The Message Repository</h1>
    <p>Messages expire after fourteen days (1,209,600 seconds)</p>
    
    <?php
        // show them their key
        $q=$_GET["key"];
        
        if( strlen(htmlspecialchars($q)) > 0 ) {
            echo '<p>Your most recent message\'s key: <span class="key">' . $q . '</span></p>';
        }
    ?>      
    
    
    <p><b>Enter the message key below,</b> <a href="/new.php">Or make a new message.</a></p>
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
    <p>Message:</p>
    
    
    <div id="messageTxt">&hellip;</div>
    
    <p><a id="saveUrl" href="/save.php?key=">Save</a></p>
    <p><a href="/new.php">Or make a new message.</a></p>
    
    <?php
        $q=$_GET["key"];
        echo '<script type="text/javascript">';
        echo 'showMessage("' . $q . '");';
        echo '</script>';
    ?>
</body>


</html>
