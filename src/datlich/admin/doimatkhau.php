<?php
    
  session_start();
	if(!isset($_SESSION['username1'])){
        header('Location:admin_login.php');
       }
       
    $msg="";
    $username = $_SESSION['username1'];
    
    include("config.php");

	if(isset($_POST['submit'])){
		$password=md5($_POST['password']);
    $passwordmoi1=md5($_POST['passwordmoi1']);
    $passwordmoi2=md5($_POST['passwordmoi2']);
		$sql = "SELECT * FROM `tbl_admintong` WHERE username='$username' AND password='$password' LIMIT 1";
		$row = mysqli_query($connection,$sql);
		$count = mysqli_num_rows($row);
		if($count>0 && $passwordmoi1==$passwordmoi2){
			$sql_update = mysqli_query($connection,"UPDATE `tbl_admintong` SET password='$passwordmoi1' WHERE username='$username'");
			$msg="<script language='javascript'>
      swal(
           'Thành công!',
           'Mật khẩu đã được thay đổi!',
           'success'      
           );
           var timer = setTimeout(function() {
            window.location=('doimatkhau.php?admin=$username')
        }, 3000);
</script>";   
  
		}else{
      if($passwordmoi1!=$passwordmoi2){
        $msg='<p style="color:red">Hai mật khẩu mới không trùng khớp!</p>';
      }else{
			$msg='<p style="color:red">Mật khẩu cũ không đúng! Vui lòng nhập lại!</p>';
		}
	} 
}
?>
   
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đặt lịch hẹn đa dịch vụ trực tuyến</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>       
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
h3{
    color:#fff;
}
</style>

<body>
<?php
    include('../admin/navbar.php');
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
    <?php
    include('../admin/thanhcongcu.php');
    ?>
<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								  <h3>Đổi mật khẩu</h3>
							</div>
							<div class="module-body">
                            <?php echo $msg;?>
                    <form action="" method="post" enctype="multipart/form-data"  >
                    <div class="control-group">
											<label class="control-label" for="basicinput">Tên tài khoản</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="username" readonly value="<?php echo $username?>" data-original-title="" class="span8 tip">
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="basicinput">Mật khẩu cũ</label>
											<div class="controls">
												<input id="password" type="password" name="password" placeholder="Nhập mật khẩu cũ" required data-original-title="" class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Mật khẩu mới</label>
											<div class="controls">
												<input id="passwordmoi1" type="password" name="passwordmoi1" placeholder="Nhập mật khẩu mới" required data-original-title="" class="span8 tip">
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="basicinput">Nhập lại mật khẩu mới</label>
											<div class="controls">
												<input id="passwordmoi2" type="password" name="passwordmoi2" placeholder="Nhập lại mật khẩu mới" required data-original-title="" class="span8 tip">
											</div>
										</div>

										<div class="control-group" style="text-align:center;">
											<div class="controls">
												<button type="submit" class="btn btn-success"  name="submit">Đổi mật khẩu</button>
											</div>
										</div>
									</form>
							</div>


            </div>
        </div>
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