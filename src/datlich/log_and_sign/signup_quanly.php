<?php
    include("../config.php");

    session_start();
    $msg="";
    
    if(isset($_POST['submit'])){
        $tenquanly= mysqli_real_escape_string($connection,($_POST['tenquanly']));
        $username= mysqli_real_escape_string($connection,($_POST['username']));
        $password= md5($_POST['password']); 
        $id_vaitro= mysqli_real_escape_string($connection,($_POST['id_vaitro']));
        $chucvu= mysqli_real_escape_string($connection,($_POST['chucvu']));
        $signup_query= "INSERT INTO `tbl_quanly`(`id_quanly`, `tenquanly`, `username`, `password`, `id_vaitro`,`chucvu`) VALUES ('','$tenquanly','$username','$password','$id_vaitro','$chucvu')"; 
        
        $check_query= "SELECT * FROM `tbl_quanly` WHERE username='$username'";
        
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
                    text: "Chờ tài khoản được duyệt để đăng nhập!",
                    icon: "success",
                    button: "Ok",
                    timer: 2000,
                    
                });
            });
        </script>';   
        
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký tài khoản cho nhân viên</title>
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
 <!-- Sweetalert -->
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
.a{
  background: #fff;
  margin: 5px 0px;
  margin-bottom: 25px;
  color:#000000;
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 13px;
  outline:none;
  font-family: inherit;
  font-size: 0.95em;
}
.login input[type="date"], .login input[type="text"], .login input[type="password"] {
  margin: 5px 0px;
  margin-bottom: 25px;

}
</style>
<body>
<div class="login-form w3_form">
      <div class="login-title w3_title">
      </div>
           <div class="login w3_login">
                <h2 class="login-header w3_header" style="font-size: 30px;">Đăng ký tài khoản quản lý</h2>
				    <div class="w3l_grid">
            <?php echo $msg; ?>
                        <form class="login-container" action="" method="post">
                              Họ tên
                             <input type="text" id="tenquanly" placeholder="Nhập họ tên" Name="tenquanly" required="" >

                             Dịch vụ
                             <select class="a" id="id_vaitro" name="id_vaitro" required>
                              <option value="">--Chọn dịch vụ--</option>  
                                <?php 
                                $sql_vt="SELECT * FROM tbl_vaitro ORDER BY id_vaitro";
                                $query_vt= mysqli_query($connection,$sql_vt);
                                while($row_vt= mysqli_fetch_assoc($query_vt)){
                                  ?>
                                  <option value="<?php echo $row_vt['id_vaitro']?>"><?php echo $row_vt['tenvaitro']?></option>
                                  <?php
                                }
                                ?>
                              </select>
                             Chức vụ
                             <select class="a" id="chucvu" name="chucvu" required>
                                  <option value="">--Chọn chức vụ--</option>  
                                  <option value="1">Quản lý nhân sự</option>
                                  <option value="2">Nhân viên</option>
                              
                              </select>
                             Tên tài khoản
                             <input type="text" id="username" placeholder="Nhập tên tài khoản" Name="username" required="" >
                             Mật khẩu
                             <input type="password" id="password" placeholder="Nhập mật khẩu" Name="password" required="">
                             <input type="submit"  name="submit" value="Đăng ký">
                        </form>
      <div class="second-section w3_section">
          <div class="bottom-header w3_bottom">
                <h3>HOẶC</h3>
          </div>
      </div>
                      
      <div class="bottom-text w3_bottom_text">
            <p>Bạn đã có tài khoản<a href="login_quanly.php">Đăng nhập</a></p>
      </div>
      <br>
          <div class="bottom-text w3_bottom_text">
                <p>Trở về<a href="../index.php">Trang chủ</a></p>
          </div>
        </div>
      </div>
        
      </div>  
          <div class="footer-w3l">
              <p style="color:black"> &copy; Đặt lịch hẹn đa dịch vụ trực tuyến</p>
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