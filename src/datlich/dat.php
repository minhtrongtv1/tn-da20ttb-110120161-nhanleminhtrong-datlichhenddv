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
    $giohen= $row['gio'];
    $ngayhen= $row['ngay'];
    $msg="";

    $sqlcheck_ngay= "SELECT * FROM tbl_booking WHERE id_khachhang='$id_khachhang' AND ngayhen='$ngayhen'";
    $rescheck_ngay=mysqli_query($connection,$sqlcheck_ngay);
    if(mysqli_fetch_assoc($rescheck_ngay)==true){
        $check_ngay=1; //khách trùng ngày
    }else{
        $check_ngay=0; //khách không trùng ngày
    }

    $sqlcheck_gio= "SELECT * FROM tbl_booking WHERE id_khachhang='$id_khachhang' AND giohen='$giohen'";
    $rescheck_gio=mysqli_query($connection,$sqlcheck_gio);
    if(mysqli_fetch_assoc($rescheck_gio)==true){
        $check_gio=1; //khách trùng ngày
    }else{
        $check_gio=0; //khách không trùng ngày
    }

    if($check_ngay==0 && $check_gio==0 || $check_ngay==1 && $check_gio==0 || $check_ngay==0 && $check_gio==0){
        $sql= "INSERT INTO `tbl_booking`(`id_booking`, `id_lichhen`, `id_khachhang`,`id_quanly`,`tinhtrang`,`ngayhen`,`giohen`) VALUES ('','$id_lichhen','$id_khachhang','$id_quanly','$tinhtrang','$ngayhen','$giohen')"; 
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
    }elseif($check_ngay==1 && $check_gio==1){
        $msg="<script language='javascript'>
             swal(
                 'Thất bại!',
                 'Trùng khung giờ với lịch hẹn khác!',
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