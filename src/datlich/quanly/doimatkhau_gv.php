<?php
    include("config.php");
    session_start();
	if(!isset($_SESSION['id_giaovien'])){
        header('Location:../login.php');
       }
    $id_giaovien = $_SESSION['id_giaovien'];

    $sql_gv = "SELECT * FROM giaovien WHERE id_giaovien='$_SESSION[id_giaovien]'";
	  $res_gv = mysqli_query($connection,$sql_gv);
    $row_gv=mysqli_fetch_assoc($res_gv);
    $msg="";
    if(isset($_POST['submit'])){
		$matkhau_gv=md5($_POST['matkhau_gv']);
        $passwordmoi1=md5($_POST['passwordmoi1']);
        $passwordmoi2=md5($_POST['passwordmoi2']);
		$sql = "SELECT * FROM giaovien WHERE id_giaovien='$id_giaovien' AND matkhau_gv='$matkhau_gv' LIMIT 1";
		$row = mysqli_query($connection,$sql);
		$count = mysqli_num_rows($row);
		if($count>0 && $passwordmoi1==$passwordmoi2){
			$sql_update = mysqli_query($connection,"UPDATE giaovien SET matkhau_gv='$passwordmoi1' WHERE id_giaovien='$id_giaovien'");
			$msg="<script language='javascript'>
      swal(
           'Thành công!',
           'Mật khẩu đã được thay đổi!',
           'success'      
           );
           var timer = setTimeout(function() {
            window.location=('canhan.php?giaovien=$id_giaovien')
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
    <meta charset="utf-8">
   
    <title>Đặt lịch hẹn đa dịch vụ trực tuyến</title>
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
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
body{
 background-image: url("../admin/images/course-1.jpg");
 height: 500px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
  height: 100%;
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
<?php if(isset($_SESSION['id_giaovien'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
  ?>    
<?php } ?>
<body > 

    <br>
  <div class="container-fluid"> 
    <div class="container "> 
     <div class="row">
       <div class="col-md-3"></div>
        <div class="col-md-6"> 
        <div class="bg-secondary rounded p-5">
            <div>
                <h1 style="text-align: center; background-color:#F2F1F8; color:#000000;">Đổi mật khẩu</h1>      
            </div> 
          <?php echo $msg;?>


            <form class="form-horizontal" action="" method="post"> 
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="username" disabled type="text" class="form-control" name="taikhoan_gv" value="<?php echo $row_gv['taikhoan_gv']?>" >
                </div>
                <br>
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="matkhau_gv"  placeholder="Mật khẩu cũ" required>
                </div>
                <br> 
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="passwordmoi1" type="password" class="form-control" name="passwordmoi1" placeholder="Mật khẩu mới" required>
                </div>
                <br>
                 
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="passwordmoi2" type="password" class="form-control" name="passwordmoi2"  placeholder="Nhập lại mật khẩu mới" required>
                </div>
                <br>
                <div style="text-align:center;">
                  <button type="submit" name="submit" class="btn buttonsua" style="font-size:20px;">Đổi mật khẩu</button>
                  
                </div>

              </form>
              <br>  
        </div> 
      </div>
        <div class="col-md-3"></div>
         
     </div>
    </div> 
</div>
<?php
    include("giaodien/footer.php");
     ?>
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

</html>

