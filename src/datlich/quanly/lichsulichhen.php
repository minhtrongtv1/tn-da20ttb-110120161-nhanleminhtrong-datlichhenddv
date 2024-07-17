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
    <title>Lịch sử đặt lịch</title>
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
    
    <style>
        body {
            background-image: url("../admin/images/course-1.jpg");
            height: 100%;
            background-position: center; 
            background-repeat: no-repeat; 
            background-size: cover;
        }
        .container-fluid {
            padding: 20px;
        }
        .list-group-item {
            background-color: #fff;
            color: #000;
            border: 1px solid #dee2e6;
            margin-bottom: 10px;
        }
        .list-group-item strong {
            font-size: 18px;
        }
        body{
            margin: 0;
            padding: 0;
            background-image: url(admin/images/background_body.jpg);
        }
        h2 {
            
            color: black;
        }
    </style>
</head>

<body>
<?php if(isset($_SESSION['id_quanly'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_quanly/header.php");
 
  ?>    
<?php } ?>
    <div class="container-fluid">
        <div class="container col-lg-7 mt-4">
            <div class="mb-5">
                <h2 style color="black">Lịch sử lịch hẹn</h2>
                <ul class="list-group">
                    <?php
                    $sql_history = "SELECT * FROM tbl_lichhen WHERE id_quanly='$id_quanly' AND trangthai_duyet='1'";
                    $res_history = mysqli_query($connection, $sql_history);
                    while ($row_history = mysqli_fetch_assoc($res_history)) {
                        echo '<li class="list-group-item">';
                        echo '<strong>' . $row_history['tenlichhen'] . '</strong><br>';
                        echo 'Tên nhân viên: ' .$row_history['tenquanly'] . '<br>';
                        echo 'Thời gian: ' . $row_history['gio'] . '<br>';
                        $odate = $row_history['ngay'];
                        $newDate = date("d-m-Y", strtotime($odate));
                        echo 'Ngày hẹn: ' . $newDate . '<br>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <?php
    include("giaodien/footer.php");
    ?>

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
</body>

</html>
