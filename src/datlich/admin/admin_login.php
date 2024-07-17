<?php 
    session_start();
    include("config.php");
    
    $msg="";
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($connection,strtolower($_POST['username']));
        
        $password=mysqli_real_escape_string($connection,md5($_POST['password'])); 
        
        $login_query="SELECT * FROM `tbl_admintong` WHERE username='$username' AND password='$password'";
        $login_res=mysqli_query($connection,$login_query);
        if(mysqli_num_rows($login_res)>0){ 
            $_SESSION['username1']=$username;
            header('Location: index.php');
        } 
        else{
            $msg="<script language='javascript'>
            swal(
                'Thất bại!',
                'Sai tên tài khoản hoặc mật khẩu!',
                 'error'      
                 );
                 var timer = setTimeout(function() {
                  window.location=('admin_login.php')
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
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'rel='stylesheet'>

        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<style>
 
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
<?php if(isset($_SESSION['username1'])==true) { ?>
   <?php
  header('Location: index.php');
  ?>
  
<?php }else{ ?>
  <?php
    include('../admin/navbar.php');
  ?>
<?php } ?>
<body> 
    <div class="wrapper ">
        <div class="container">
            <div class="row">
						<div class="module container" style="width:70%; ">
							<div class="module-head"style=";background-color: #aa135e;" >
								<h1 style="text-align:center;color:#fff;">ĐĂNG NHẬP ADMIN</h1>
							</div>
							<div class="module-body">
                            <?php echo $msg; ?>
                                    <form class="form-horizontal row-fluid "  action="" method="post">
										<div class="control-group">
											<label class="control-label" for="basicinput">Tên đăng nhập</label>
											<div class="controls">
                                                <input id="username" data-title="A tooltip for the input" type="text" name="username" data-original-title="" class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Mật khẩu</label>
											<div class="controls">
                                                <input id="password" data-title="A tooltip for the input" type="password" name="password" data-original-title="" class="span8 tip">
											</div>
										</div>
                                        <br><br>
										<div style="text-align: center;">
												<button type="submit" name="submit" class="btn buttonsua">Đăng nhập</button>
											</div>
										</div>
                                        
									</form>
                                        <!-- <div style="text-align: center;">
											Tạo tài khoản Admin <a type="submit" name="dangky" href="signup_admin.php">Đăng ký</a>
										</div> -->
                                        <br>
                            </div>
                        </div>
                </div>
            </div> 
        </div>
    </div>
    <?php
    include('../admin/footer.php');
  ?>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 
</body>
</html>