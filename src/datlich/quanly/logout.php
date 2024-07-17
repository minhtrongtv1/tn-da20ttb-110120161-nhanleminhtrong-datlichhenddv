  <?php
    
    session_start();
    //echo $_SESSION['user'];
    unset($_SESSION['id_quanly']); 
    //echo 'session has destroyed';
   header ("Location: ../index.php");
?>