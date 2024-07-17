<?php 
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_quanly'])){
      header('Location:../login.php');
     }
     $id_quanly= $_SESSION['id_quanly'];
     $id_lichhen= $_GET['id_lichhen'];
     $sql= "SELECT * FROM `tbl_lichhen`,`tbl_vaitro` WHERE tbl_lichhen.id_lichhen='$id_lichhen' AND tbl_vaitro.id_vaitro=tbl_lichhen.id_vaitro";
     $res=mysqli_query($connection,$sql);
     $row= mysqli_fetch_assoc($res);

     $sql1= "SELECT * FROM `tbl_lichhen`,`tbl_khachhang`,`tbl_booking` WHERE tbl_lichhen.id_lichhen='$id_lichhen' AND tbl_lichhen.id_lichhen=tbl_booking.id_lichhen AND tbl_khachhang.id_khachhang=tbl_booking.id_khachhang";
     $res1=mysqli_query($connection,$sql1);
  


     $sqlluothen= "SELECT * FROM `tbl_booking` WHERE id_lichhen='$id_lichhen' AND tinhtrang='1'";
     $resluothen=mysqli_query($connection,$sqlluothen);
     $luothen=0;
     while(mysqli_fetch_assoc($resluothen)){
        $luothen++;
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
<?php if(isset($_SESSION['id_quanly'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
 
  ?>    
<?php } ?>
<body >

<div class="container-fluid ">

<div class=" container col-lg-7 mt-4 ">
    <!-- Recent Post -->
    <div class="mb-5">				
    <table class="table table-bordered table-striped table-responsive-stack" style="color:#000;" id="tableOne">
        <thead>
         <tr>
         <td colspan="2" style="text-align:center;"><img src="../admin/images/<?php echo $row['hinhanh'] ?>"width="250px"></td>
         </tr>
        </thead>
         <tbody >
         
            <tr>
                <th>Thuộc mục</th>
                <td><?php echo ucwords($row['tenvaitro']); ?></td>
            </tr>
            <tr>
                <th>Tên nhân viên</th>
                <td><?php echo ucwords($row['tenquanly']); ?></td>
            </tr>
            <tr>
                <th>Lịch hẹn</th>
                <td><?php echo ucwords($row['tenlichhen']); ?></td>
            </tr>
            <tr>
                <th>Thời gian làm việc</th>
                <td><?php echo $row['thoigianlamviec']; ?></td>
            </tr>
            <tr>
                <th>Tóm tắt</th>
                <td><?php echo $row['tomtat']; ?></td>
            </tr>
            <tr>
                <th>Nội dung</th>
                <td><?php echo $row['noidung']; ?></td>
            </tr>
            <tr>
                <th>Cơ quan</th>
                <td><?php echo $row['tencoquan']; ?></td>
            </tr>
            <tr>
                <th>Địa chỉ cơ quan</th>
                <td><?php echo $row['diachi']; ?></td>
            </tr>
            <tr>
                <th>Ngày hẹn</th>
                <td> <?php    
                        $odate = $row['ngay'];
                        $newDate = date("d-m-Y", strtotime($odate));
                        echo $newDate."\n";
                    ?></td>
            </tr>
            <tr>
                <th>Giờ hẹn</th>
                <td><?php echo $row['gio']; ?></td>
            </tr>
            <tr>
                <th>Khách hàng đặt lịch</th>
                <td>
                <?php if(mysqli_num_rows($res1)>0){ ?>
                    <?php $stt=0; ?>
                    <?php while($row1=mysqli_fetch_assoc($res1)) {  ?>
                        <?php $stt++; ?>
                        <?php echo $stt; ?>. <?php echo $row1['hovaten']; ?><br>
                        <?php }
                     }?>
                </td>
            </tr>
            <tr>
                <td colspan=2 style=" text-align:center;">
                <?php 
                    $sql_duyet= "SELECT * FROM `tbl_booking` WHERE id_lichhen='$id_lichhen' AND id_quanly='$id_quanly' AND duocduyet='0'";
                    $res_duyet=mysqli_query($connection,$sql_duyet);

                    // $sqlcheck_khachhang= "SELECT * FROM `tbl_booking` WHERE id_lichhen='$id_lichhen' AND id_khachhang='$id_khachhang'";
                    // $rescheck_khachhang=mysqli_query($connection,$sqlcheck_khachhang);
                    if(mysqli_fetch_assoc($res_duyet)>0){ ?>
                        <a class="btn buttonsua" href="duyetlich.php?id_lichhen=<?php echo $id_lichhen;?>">DUYỆT LỊCH</a> 
                    <?php }else{ ?>
                        <h4 style="color: red;">ĐÃ DUYỆT LỊCH HẸN!</h4>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
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
