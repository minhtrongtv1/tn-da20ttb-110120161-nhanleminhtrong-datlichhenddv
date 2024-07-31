<?php 
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_khachhang'])){
      header('Location:../login.php');
     }
     $id_khachhang= $_SESSION['id_khachhang'];

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
<?php if(isset($_SESSION['id_khachhang'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_user/header_user.php");
 
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
                    <th style="width:10%;">Lịch đã hẹn</th>
                    <th style="width:8%;">Thời gian</th>
                    <th style="width:8%;">Ngày hẹn</th>
                    <th style="width:8%;">Phê duyệt</th>
                </tr> 
                <?php                
                    $sql_duyet= "SELECT * FROM `tbl_booking`, `tbl_lichhen` WHERE tbl_booking.id_lichhen=tbl_lichhen.id_lichhen AND tbl_booking.id_khachhang='$id_khachhang' AND tbl_booking.duocduyet='1'";
                    $res_duyet=mysqli_query($connection,$sql_duyet);
                    $sql_kh= "SELECT * FROM tbl_booking, tbl_lichhen WHERE tbl_booking.id_lichhen=tbl_lichhen.id_lichhen AND tbl_booking.id_khachhang='$id_khachhang'"; 
                    $res_kh= mysqli_query($connection,$sql_kh);
                    $so=0;
                    while($row_kh= mysqli_fetch_assoc($res_kh)){ ?>
                        <?php $so++;?>
                        <tr>
                            <td><?php echo $so;?></td>
                            <td><?php echo $row_kh['tenlichhen'];?></td>
                            <td><?php echo $row_kh['gio'];?></td>
                            <td><?php    
                                $odate = $row_kh['ngay'];
                                $newDate = date("d-m-Y", strtotime($odate));
                                echo $newDate."\n";
                                ?>
                            </td>
                            <?php 
                                if(($row_duyet=mysqli_fetch_assoc($res_duyet))>0){ ?>
                                    <td style="text-align:center"><h6 style="color: red;">LỊCH HẸN ĐÃ DUYỆT</h6></td>
                                <?php }else{ ?>
                                    <td style="text-align:center"><a type="submit" class="btn buttonxoa" href="huyhen.php?id_lichhen=<?php echo $row_kh['id_lichhen']?>">Hủy hẹn</a></td>
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
