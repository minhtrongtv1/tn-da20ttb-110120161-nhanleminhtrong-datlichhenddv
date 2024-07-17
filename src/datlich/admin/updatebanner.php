<?php

$banner= $_FILES['banner']['name'];
move_uploaded_file($_FILES['banner']['tmp_name'],"../admin/images/".$_FILES['banner']['name']); 
$bannercu=$_POST['bannercu'];


include("config.php"); 
   if (isset($_POST['suabanner']) && $banner =="" ){
   $sql="UPDATE banner SET banner='$bannercu' WHERE id_banner='$_GET[id_banner]'";
   mysqli_query($connection,$sql);

                  if(mysqli_query($connection,$sql)){
                  header("Location: quanlybanner.php"); 
                  }else{
                  echo "Not inserted";
                  }

   }

   if (isset($_POST['suabanner']) && $banner !=""){
   $sql="UPDATE banner SET banner='$banner' WHERE id_banner='$_GET[id_banner]'";
   mysqli_query($connection,$sql);

                  if(mysqli_query($connection,$sql)){
                  header("Location: quanlybanner.php"); 
                  }else{
                  echo "Not inserted";
                  }

   }
   // else{
   //    $sql="UPDATE banner SET hinh='$hinhcu' WHERE id_banner='$_GET[id_banner]'";
   // }
   
   ?>