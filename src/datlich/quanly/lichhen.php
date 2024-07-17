<?php 
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_quanly'])){
      header('Location:../login.php');
     }
     $id_quanly=$_SESSION['id_quanly'];
     $sql= "SELECT * FROM `tbl_lichhen` WHERE id_quanly='$id_quanly'";
     $res=mysqli_query($connection,$sql);

    
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
    background-image: url(../images/background_body.jpg);
}


</style>
<?php if(isset($_SESSION['id_quanly'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
 
  ?>    
<?php } ?>
<body >
  <?php
    // include("giaodien_quanly/about.php");
    // include("giaodien/carousel.php");

  ?>
<div class="container-fluid ">
        <div class="container py-5">  
        <div class="row pb-3">
            <?php if(mysqli_num_rows($res)>0){ ?>
                    <?php while($row=mysqli_fetch_assoc($res)) {  ?>
                       <?php
                        $sqlluothen= "SELECT * FROM `tbl_booking` WHERE id_lichhen='$row[id_lichhen]' AND id_quanly='$id_quanly' AND tinhtrang='1'";
                        $resluothen=mysqli_query($connection,$sqlluothen);
                        $luothen=0;
                        while(mysqli_fetch_assoc($resluothen)){
                            $luothen++;
                        }?>
                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <span><img class="img-fluid" style="height:300px;" src="../admin/images/<?php echo $row["hinhanh"]; ?>"  alt=""></span>
                        <a class="blog-overlay text-decoration-none" href="xemlichhen.php?id_lichhen=<?php echo $row["id_lichhen"]; ?>">
                        <h5 class="text-white mb-3"style="width:100%;"><?php echo $row["tenlichhen"]; ?></h5> 
                        <h5 class="text-white mb-3"style="width:100%;">Giờ: <?php echo $row["gio"]; ?></h5> 
                        <h5 class="text-white mb-3"style="width:100%;">Ngày: 
                            <?php    
                                 $odate = $row['ngay'];
                                 $newDate = date("d-m-Y", strtotime($odate));
                                 echo $newDate."\n";
                            ?></h5> 
                        <h5 class="text-white mb-3"style="width:100%;">Lượt hẹn: (<?php echo $luothen; ?>/5)</h5> 
                        </a>
                    </div>
                    <div class="text-center mt-2">
                                <a href="sualichhen.php?id_lichhen=<?php echo $row["id_lichhen"]; ?>" class="btn btn-success">Sửa lịch hẹn</a>
                                <a class="btn btn-danger " onclick="return confirm('Bạn có chắc muốn xóa lịch hẹn này?')" href="xoalichhen.php?id_lichhen=<?php echo $row["id_lichhen"]; ?>">Xóa lịch hẹn</a>
                    </div>
                    
                </div>
                
                <?php } }else{ ?>
                    <div >
                        <h2 style="color:#000;text-align:center;">(Trống!)</h2>
                    </div>
                    
                <?php  }?>  
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
