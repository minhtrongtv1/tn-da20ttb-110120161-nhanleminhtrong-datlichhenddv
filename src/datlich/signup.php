<?php
    include("config.php");

    session_start();
    $msg="";
    
    if(isset($_POST['submit'])){
        $hovaten= mysqli_real_escape_string($connection,($_POST['hovaten']));
        $sodienthoai= mysqli_real_escape_string($connection,($_POST['sodienthoai']));
        $email= mysqli_real_escape_string($connection,($_POST['email']));
        $diachi= mysqli_real_escape_string($connection,($_POST['diachi']));
        $taikhoan= mysqli_real_escape_string($connection,($_POST['taikhoan']));
        $matkhau= md5($_POST['matkhau']); 
        
        
        $signup_query= "INSERT INTO `tbl_khachhang`(`id_khachhang`, `hovaten`, `taikhoan`,`matkhau`,`sodienthoai`,`email`,`diachi`) VALUES ('','$hovaten','$taikhoan','$matkhau','$sodienthoai','$email','$diachi')"; 
        
        $check_query= "SELECT * FROM `tbl_khachhang` WHERE taikhoan='$taikhoan'";
        
        $check_res=mysqli_query($connection,$check_query);
        
        if(mysqli_num_rows($check_res)>0){

          $msg='<script type="text/javascript">
          $(document).ready(function() {
                swal("Tên tài khoản đã tồn tại! Vui lòng nhập lại!", {
                          icon: "error",
                      });
                  
              });
          </script>'; 
        }
        
        else{
            $signup_res= mysqli_query($connection,$signup_query); 
            $msg='<script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "Đăng ký thành công!",
                    text: "Bạn có thể đăng nhập ngay bây giờ!",
                    icon: "success",
                    button: "Ok",
                    timer: 2000
                });
            });
        </script>';   
            
        }
        
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   
    <title>Dịch vụ đặt lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

        <!-- Sweetalert -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Datepicker -->
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#ngaysinh_hv" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1]
            });
         });
      </script>
</head>
<style>
body{
  background-image: url("images/background_body.jpg");
 height: 500px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
  height: 100%;
}
    </style>
<?php
  include("giaodien/topbar.php");
  include("giaodien/header.php");
?>
<body>  
<br>
<br>
<div class="container-fluid"> 
      <div class="container "> 
       <div class="row ">
         <div class="col-md-3"></div>
      <div class="col-md-6"> 
      <div class="bg-secondary rounded p-5"> 
          <form class="form-horizontal" action="" method="post">
            <?php echo $msg;?> 
          <div class="hinh">
              <h1 style="text-align: center; background-color:#F2F1F8; color:#000000;">Đăng ký tài khoản</h1>      
          </div> 
          <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="hovaten" type="text" class="form-control" name="hovaten" placeholder="Nhập họ và tên" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="diachi" type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ"required>
                </div>
                <br>
                 <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="sodienthoai" type="number" class="form-control" name="sodienthoai" placeholder="Nhập số điện thoại"required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email"required>
                </div>
                <br>
               
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="taikhoan" type="text" class="form-control" name="taikhoan" placeholder="Tên tài khoản"required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="matkhau" type="password" class="form-control" name="matkhau" placeholder="Mật khẩu"required>
                </div>
                <br> 
                
                <div style="text-align:center;" >
                  <button type="submit" name="submit" class="btn btn-success" style="font-size:20px;">Đăng ký</button>
                  
                </div>             
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <a href="log_and_sign/signup_quanly.php" class="btn btn-success py-md-2 px-md-4 font-weight-semi-bold mt-2" style="width:100%">Đăng ký tài khoản quản lý</a>
              </div>
              <br>      
            </form>
      </div> 
    </div>
    <div class="col-md-3"></div>
     </div>
    </div> 
</div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>