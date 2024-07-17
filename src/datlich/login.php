<?php 
    session_start();
    include('config.php');
    
    $msg="";
    if(isset($_POST['submit'])){
        $taikhoan=mysqli_real_escape_string($connection,strtolower($_POST['taikhoan']));
        
        $matkhau=mysqli_real_escape_string($connection,md5($_POST['matkhau'])); 
        
        $login_query="SELECT * FROM `tbl_khachhang` WHERE taikhoan='$taikhoan' AND matkhau='$matkhau'";
        
        $login_res=mysqli_query($connection,$login_query);
        
        if(mysqli_num_rows($login_res)>0){ 
            $row = mysqli_fetch_array($login_res);
            $_SESSION['taikhoan']=$taikhoan;
            $_SESSION['id_khachhang']=$row['id_khachhang'];
            header('Location: khachhang_index.php');

        } 
        else{
             $msg= '<div class="alert alert-danger alert-dismissable" style="margin-top:30px";>
                    <a href="login.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Thất bại!</strong> Sai tên tài khoản hoặc mật khẩu!.
                  </div>';
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
</head>

<style>
body {
	background-image: url("../img/background_body.jpg");
  height: 500px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
  height: 800px;
} 
.buttonsua {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: auto;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonsua {  background-color: white;   color: black;   border: 2px solid green;}
.buttonsua:hover {  background-color: green;  color: white;}
.buttonxoa {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: 120px;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonxoa {  background-color: white;   color: black;   border: 2px solid red;}
.buttonxoa:hover {  background-color: red;  color: white;}
.buttonthem {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold;  color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonthem {  background-color: white;   color: black;   border: 2px solid #17a2b8;}
.buttonthem:hover {  background-color: #17a2b8;  color: white;}
</style>

<?php if(isset($_SESSION['id_hocvien'])==true) { ?>
   <?php
  header('Location: user.php');
  ?>
<?php }else{ ?>
  <?php
  include("giaodien/topbar.php");
  include("giaodien/header.php");
  ?>
<?php } ?>
<body>  
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
              <h1 style="text-align: center; background-color:#F2F1F8; color:#000000;">Đăng nhập</h1>      
          </div> 
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="taikhoan" type="text" class="form-control" name="taikhoan" placeholder="Tên tài khoản" required>
              </div>
                          <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="matkhau" type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" required>
              </div>
                          <br> 
              <div style="text-align:center;">
                 <button type="submit" name="submit" class="btn buttonsua" style="font-size:20px;">Đăng nhập</button>
                            
              </div>
                <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <a href="log_and_sign/login_quanly.php" class="btn btn-danger py-md-2 px-md-4 font-weight-semi-bold mt-2" style="width:100%">Đăng nhập quản lý</a>
              </div>   
            </form>
      </div> 
    </div>
    <div class="col-md-3"></div>
     </div>
    </div> 
</div>
<br>
<!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
<?php
    include("giaodien/footer.php");
     ?>
</html>