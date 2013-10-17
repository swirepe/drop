function showMessage(str){
    if (str.length==0){ 
        document.getElementById("messageTxt").innerHTML="";
        document.getElementById("saveUrl").href="";
        
        return;
    }
    // code for IE7+, Firefox, Chrome, Opera, Safari
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }else{
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
          document.getElementById("messageTxt").innerHTML=xmlhttp.responseText;
          document.getElementById("saveUrl").href="/save.php?key=" + xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("GET","getmessage.php?key="+str,true);
    xmlhttp.send();
}
