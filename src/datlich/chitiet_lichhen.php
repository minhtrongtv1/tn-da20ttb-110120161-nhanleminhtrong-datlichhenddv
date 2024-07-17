<?php
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_khachhang'])){
        header('Location:../login.php');
    }

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $id = mysqli_real_escape_string($connection, $id);

    $sql = "SELECT * FROM `tbl_lichhen` WHERE `id_lichhen` = '$id'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chi tiết lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include("giaodien/topbar.php"); ?>
<?php include("giaodien_user/header_user.php"); ?>
 <div class="container py-5">  
        <div class="row pb-3">
            
                        <?php 
                            $sqlluothen= "SELECT * FROM `tbl_booking` WHERE id_lichhen='$row[id_lichhen]' AND tinhtrang='1'";
                            $resluothen=mysqli_query($connection,$sqlluothen);
                            $luothen=0;
                            while(mysqli_fetch_assoc($resluothen)){
                            $luothen++;
                        }?>
                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <span><img class="img-fluid" style="height:300px;" src="admin/images/<?php echo $row["hinhanh"]; ?>"  alt=""></span>
                        <a class="blog-overlay text-decoration-none" href="datlichhen.php?id_lichhen=<?php echo $row["id_lichhen"]; ?>">
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
                </div>
                <?php  ?>
                    <div >
                        <!-- <h2 style="color:#000;text-align:center;">(Trống!)</h2> -->
                </div>
                <?php  ?>  
        </div>
                   
 </div>
<?php include("giaodien/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>
<script src="js/main.js"></script>
</body>
</html>
