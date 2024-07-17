<?php 
    session_start();
    include('../config.php');
    
    $msg="";
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($connection,strtolower($_POST['username']));
        
        $password=mysqli_real_escape_string($connection,md5($_POST['password'])); 
        
        $login_check="SELECT * FROM `tbl_quanly` WHERE username='$username' AND password='$password' AND trangthai_dn='1'";
        $login_check=mysqli_query($connection,$login_check);

        if(mysqli_num_rows($login_check)>0){
          $login_query1="SELECT * FROM `tbl_quanly` WHERE username='$username' AND password='$password'";
          $login_res1=mysqli_query($connection,$login_query1);
        if(mysqli_num_rows($login_res1)>0){ 
            $row1 = mysqli_fetch_array($login_res1);
            $_SESSION['id_quanly']=$row1['id_quanly'];
            header('Location: ../quanly/index_quanly.php');

        } 
        else{
          $msg='<script type="text/javascript">
          $(document).ready(function() {
                swal("Sai tên tài khoản hoặc mật khẩu!", {
                          icon: "error",
                      });
                  
              });
          </script>'; 
        }
      }else{
        $msg='<script type="text/javascript">
        $(document).ready(function() {
              swal("Tài khoản chưa được duyệt!", {
                        icon: "error",
                    });
                
            });
        </script>'; 
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký tài khoản cho quản lý</title>
 <!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme  -->
<link rel="stylesheet" href="cssform/style.css">
   <!-- font-awesome icons -->
<link href="cssform/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <style>
body {
	background-image: url("../img/background_body.jpg");
  font-size: 100%;
	font-family: 'Montserrat', sans-serif;
	background-size:cover;
	background-attachment:fixed;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	-ms-background-size:cover;
} 
</style>
<body>
<div class="login-form w3_form">
  <!--  Title-->
      <div class="login-title w3_title">
      </div>
           <div class="login w3_login">
                <h2 class="login-header w3_header" style="font-size: 30px;">Đăng nhập tài khoản quản lý</h2>
				    <div class="w3l_grid">
                <form class="login-container" action="" method="post">
                  <?php echo $msg;?>
                  <input id="username" type="text" class="form-control" name="username" placeholder="Tên tài khoản" required>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                <br> 
                
                <div style="text-align:center;">
                  <input type="submit" name="submit" class="btn buttonsua" value="Đăng nhập" style="font-size:20px;"><br>
                </div>
                </form>
<div class="second-section w3_section">
     <div class="bottom-header w3_bottom">
          <h3>Hoặc</h3>
     </div>
</div>
                 
<div class="bottom-text w3_bottom_text">
      <p>Bạn chưa có tài khoản<a href="signup_quanly.php">Đăng ký</a></p>
</div>
<br>
<div class="bottom-text w3_bottom_text">
      <p>Trở về<a href="../index.php">Trang chủ</a></p>
</div>
</div>
</div>
  
</div>  
<div class="footer-w3l">
		<p> &copy; Dịch vụ đặt lịch hẹn đa dịch vụ trực tuyến</p>
</div>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>