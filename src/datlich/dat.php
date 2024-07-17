<?php
    include("config.php");
    session_start();
    if(!isset($_SESSION['id_khachhang'])){
      header('Location:../login.php');
     }
    $id_lichhen= $_GET['id_lichhen'];
    $id_khachhang= $_SESSION['id_khachhang'];

    $sql= "SELECT * FROM `tbl_lichhen` WHERE id_lichhen='$id_lichhen'";
    $res=mysqli_query($connection,$sql);
    $row= mysqli_fetch_assoc($res);
    $id_quanly= $row['id_quanly'];
    $tinhtrang='1';
    $msg="";
        $sql= "INSERT INTO `tbl_booking`(`id_booking`, `id_lichhen`, `id_khachhang`,`id_quanly`,`tinhtrang`) VALUES ('','$id_lichhen','$id_khachhang','$id_quanly','$tinhtrang')"; 
        $res= mysqli_query($connection,$sql);
        if($res=true){
             $msg="<script language='javascript'>
             swal(
                 'Thành công!',
                 'Đã đặt lịch hẹn!',
                  'success'      
                  );
                  var timer = setTimeout(function() {
                   window.location=('datlichhen.php?id_lichhen=$id_lichhen')
               }, 2000);
       </script>";
     }else{
        $msg="<script language='javascript'>
             swal(
                 'Thất bại!',
                 'Không thể đặt lịch hẹn!',
                  'error'      
                  );
                  var timer = setTimeout(function() {
                   window.location=('datlichhen.php?id_lichhen=$id_lichhen')
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