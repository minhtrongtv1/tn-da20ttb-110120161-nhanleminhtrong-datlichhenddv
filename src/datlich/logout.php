  <?php
    
    session_start();
    //echo $_SESSION['user'];
    unset($_SESSION['id_khachhang']); 
    unset($_SESSION['taikhoan']); 
    //echo 'session has destroyed';
   header ("Location:index.php");
?>