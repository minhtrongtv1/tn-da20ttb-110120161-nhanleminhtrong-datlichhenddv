<?php
    include("config.php");

    $id= $_GET['id_lichhen'];
    session_start();
    if(!isset($_SESSION['id_quanly'])){
      header('Location:../login.php');
     }
   
    $msg="";
         $sql="DELETE FROM `tbl_lichhen` WHERE id_lichhen='$id'";
         $result=mysqli_query($connection,$sql);
         if(mysqli_query($connection,$sql)){
             $msg="<script language='javascript'>
             swal(
                 'Thành công!',
                 'Đã xóa lịch hẹn!',
                  'success'      
                  );
                  var timer = setTimeout(function() {
                   window.location=('lichhen.php')
               }, 2000);
       </script>";
     }else{
        $msg="<script language='javascript'>
             swal(
                 'Thất bại!',
                 'Không thể xóa lịch hẹn!',
                  'error'      
                  );
                  var timer = setTimeout(function() {
                   window.location=('lichhen.php')
               }, 2000);
       </script>";
     }
    
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dịch vụ đặt lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<body>
    <?php echo $msg; ?>
</body>