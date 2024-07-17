<?php 
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_quanly'])){
      header('Location:../login.php');
     }
     $id_quanly= $_SESSION['id_quanly'];

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
    margin: 0;
    padding: 0;
    background-image: url(admin/images/background_body.jpg);
}
.buttonsua {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: 120px;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonsua {  background-color: white;   color: black;   border: 2px solid green;}
.buttonsua:hover {  background-color: green;  color: white;}
.buttonxoa {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: 120px;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonxoa {  background-color: white;   color: black;   border: 2px solid red;}
.buttonxoa:hover {  background-color: red;  color: white;}
.buttonthem {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold;  color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonthem {  background-color: white;   color: black;   border: 2px solid #17a2b8;}
.buttonthem:hover {  background-color: #17a2b8;  color: white;}


</style>
<?php if(isset($_SESSION['id_quanly'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
 
  ?>    
<?php } ?>
<body >
        <div class="container-fluid">
                <div class=" container col-lg-7 mt-4 ">
                    <!-- Recent Post -->
                    <div class="mb-5">
            <table class="table table-bordered table-striped table-responsive-stack" style="color:#000; background-color:#fff;" id="tableOne">

                <tr>
                    <th style="width:1%;">STT</th>
                    <th style="width:10%;">Tên nhân viên</th>
                    <th style="width:20%;">Phê duyệt</th>
                </tr> 
                <?php
                
                    $sql_vaitro= "SELECT * FROM `tbl_quanly` WHERE id_quanly='$id_quanly'";
                    $res_vaitro=mysqli_query($connection,$sql_vaitro);
                    $row_vaitro= mysqli_fetch_assoc($res_vaitro);
                    $id_vaitro=$row_vaitro['id_vaitro'];

                    $sql_duyet= "SELECT * FROM `tbl_quanly` WHERE id_vaitro='$id_vaitro' AND chucvu='0'";
                    $res_duyet=mysqli_query($connection,$sql_duyet);


                    $so=0;
                    while($row_duyet= mysqli_fetch_assoc($res_duyet)){ ?>
                        <?php $so++;?>
                        <tr>
                            <td><?php echo $so;?></td>
                            <td><?php echo $row_duyet['tenquanly'];?></td>
                            <?php 
                                if(($row_duyet['trangthai_dn'])==0){ ?>
                                    <td style="text-align:center"><a style="width: 150px;" class="btn buttonxoa" href="duyet.php?id_quanly=<?php echo $row_duyet['id_quanly']?>&trangthai_dn=1">Chưa duyệt</a></td>
                                <?php }else{ ?>
                                    <td style="text-align:center"><a style="width: 150px;" class="btn buttonsua" href="duyet.php?id_quanly=<?php echo $row_duyet['id_quanly']?>&trangthai_dn=0">Đã duyệt</a></td>
                                <?php } ?>
                        </tr>
                    <?php } ?>

            </table>
        </div>
    </div>
</div>

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
