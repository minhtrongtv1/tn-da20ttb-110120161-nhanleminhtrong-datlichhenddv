<?php
    include("config.php");
    session_start();
	if(!isset($_SESSION['id_quanly'])){
        header('Location:../login.php');
    }
    $sqlten= "SELECT * FROM `tbl_quanly`, `tbl_vaitro` WHERE id_quanly='$_SESSION[id_quanly]' AND tbl_vaitro.id_vaitro=tbl_quanly.id_vaitro";
    $resten=mysqli_query($connection,$sqlten);
    $rowten=mysqli_fetch_assoc($resten);
    $msg= "" ;     
    $id_quanly1 = $rowten['id_quanly'];
    $tenquanly1 = $rowten['tenquanly'];
    $vaitro1= $rowten['id_vaitro'];

    if(isset($_POST['submit'])){
        $tenlichhen= $_POST['tenlichhen'];
        $hinhanh= $_FILES['hinhanh']['name'];
        move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../admin/images/".$_FILES['hinhanh']['name']); 
        $tomtat= $_POST['tomtat'];
        $noidung=$_POST['noidung'];
        $id_vaitro= $vaitro1;
        $diachi= $_POST['diachi'];
        $tencoquan= $_POST['tencoquan'];
        $tenquanly= $tenquanly1;
        $gio= $_POST['gio'];
        $ngay= $_POST['ngay'];
        $id_quanly = $id_quanly1;

        $signup_query= "INSERT INTO `tbl_lichhen`(`id_lichhen`, `tenlichhen`,`hinhanh`, `tomtat`, `noidung`, `id_vaitro`, `diachi`, `tencoquan`, `tenquanly`,`gio`,`ngay`,`id_quanly`) VALUES ('','$tenlichhen','$hinhanh','$tomtat','$noidung','$id_vaitro','$diachi','$tencoquan','$tenquanly','$gio','$ngay','$id_quanly')"; 
        
       
            $msg='<script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "Thành công!",
                    text: "Lịch hẹn mới đã được tạo!",
                    icon: "success",
                    button: "Ok",
                    timer: 2000
                });
            });
        </script>';   
            
        
        
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

    <!-- Favicon -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

body{
  background-image: url("../img/background_body.jpg");
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

.a{
  background-image: url(images/background_body.jpg);
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
</style>
<?php if(isset($_SESSION['id_quanly'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
 
  ?>    
<?php } ?>
<body >
<br>
<div class="container-fluid"> 
      <div class="container "> 
 
      <div class="col-md-8 container"> 
      <div class="bg-secondary rounded p-5">
          
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 
          <?php echo $msg;?>
          <div class="hinh">
              <h1 style="text-align: center; background-color:#F2F1F8; color:#000000;">Tạo lịch hẹn mới</h1>      
          </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="text" class="form-control" readonly value="<?php echo ucwords($rowten['tenquanly']);?>" >
              </div>
                <br>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="tenlichhen" placeholder="Nhập tên lịch hẹn" required>
              </div>
              <br>
              <!-- <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="malichhen" placeholder="Nhập mã lịch hẹn" required>
              </div>
              <br> -->
              <!-- <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="thoigianlamviec" placeholder="Nhập thời gian làm việc" required>
              </div>
              <br> -->
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="tomtat" placeholder="Tóm tắt" required>
              </div>
              <br>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <textarea type="text" class="form-control" name="noidung" placeholder="Nhập nội dung"></textarea>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="text" class="form-control" readonly value="<?php echo ucwords($rowten['tenvaitro']);?>" >
              </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="file" class="a" name="hinhanh" required>
              </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ" required>
              </div>
              <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="tencoquan" placeholder="Nhập tên cơ quan" required>
              </div>
              <br>
              <div class="input-group">
                    <select class="form-control" name="gio" required>
                        <option value="7h00">7h00-8h00</option>
                        <option value="8h00-9h00">8h00-9h00</option>
                        <option value="9h00-10h00">9h00-10h00</option>
                        <option value="10h00-11h00">10h00-11h00</option>
                        <option value="13h00-14h00">13h00-14h00</option>
                        <option value="14h00-15h00">14h00-15h00</option>
                        <option value="15h00-16h00">15h00-16h00</option>
                        <option value="16h00-17h00">16h00-17h00</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="date" class="form-control" name="ngay" placeholder="Chọn ngày" required>
              </div>
                <br>
              <div style="text-align:center;">
                 <button type="submit" name="submit" class="btn buttonsua" style="font-size:20px;">Tạo mới</button>
                            
              </div>
                
            </form>
      </div> 
      <br>

        </div>
    </div> 
</div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
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
    <script>
    function startLoop() {
    setInterval( "doSomething()", 5000 ); }
    function doSomething() {
    document.getElementById('myMarquee').stop(); }
</script>
</body>
<?php
  include("giaodien/footer.php");
  ?>
</html>
