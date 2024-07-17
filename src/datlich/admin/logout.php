<?php
    
    session_start();
    //echo $_SESSION['user'];
    unset($_SESSION['username1']); 
    //echo 'session has destroyed';
   header ("Location:admin_login.php");
?>