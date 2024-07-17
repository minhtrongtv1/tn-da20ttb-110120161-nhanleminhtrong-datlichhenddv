<?php
   $id_vaitro=$_GET['id_vaitro'];
   $tenvaitro=$_POST['tenvaitro'];

   include("config.php");
      
   if (isset($_POST['suadanhmuc'])){
   $sql="UPDATE `tbl_vaitro`SET tenvaitro='$tenvaitro' WHERE id_vaitro='$_GET[id_vaitro]'";
         if(mysqli_query($connection,$sql)){
            $msg="<script language='javascript'>
            swal(
               'Thành công!',
               'Đã sửa danh mục!',
               'success'      
               );
               var timer = setTimeout(function() {
                  window.location=('suadanhmuc.php?id_vaitro=$id_vaitro')
            }, 2000);
      </script>";                 
      }
   }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đặt lịch hẹn đa dịch vụ</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<body>
    <?php echo $msg; ?>
</body>
</html>