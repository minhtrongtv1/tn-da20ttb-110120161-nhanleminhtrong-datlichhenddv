<?php
   $id= $_GET['id_banner'];

   include("config.php");
   $sql="DELETE FROM banner WHERE id_banner='$id'";
   $result=mysqli_query($connection,$sql);
   if(mysqli_query($connection,$sql)){
       header("Location: quanlybanner.php");
   }else{
         echo "Not deleted";
   }
   
?>
