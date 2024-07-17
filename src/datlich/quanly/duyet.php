<?php 
 include("config.php");
 $id_quanly=$_GET['id_quanly'];
 $trangthai_dn=$_GET['trangthai_dn'];
 $sql="UPDATE `tbl_quanly` SET trangthai_dn='$trangthai_dn' WHERE id_quanly='$id_quanly'";
 mysqli_query($connection,$sql);
 header('Location: duyetnhansu.php');
?>