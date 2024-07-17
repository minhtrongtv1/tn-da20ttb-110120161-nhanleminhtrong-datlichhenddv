<?php 
    include("config.php");
    $sql= "SELECT * FROM `tbl_vaitro`";
    $res=mysqli_query($connection,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   
    <title>Dịch vụ đặt lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Datlich" name="keywords">
    <meta content="Datlich" name="description">

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
    <link href="css/phudien.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Nhúng jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
        
$('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
    </script>
</head>
<style>
  .body{
    background-image: url("images/background_body.jpg");
  }
.colormix1{
        background-image: linear-gradient(#ffff80, #00aefd);
    }
</style>
<?php
  include("giaodien/topbar.php");
  include("giaodien/header.php");
  
  ?>

<body>
<div  class="container-fluid py-5">
<?php
  include("giaodien/carousel.php");
?>
<div class="container pt-3 pb-3">
            <div class="text-center mb-3">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Danh mục</h5>
            </div>
            <div class="row pb-3">
            <?php if(mysqli_num_rows($res)>0){ ?>
                    <?php while($row=mysqli_fetch_assoc($res)) {  ?>
                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2 center">
                    <span><a href="#" class="btn btn-success py-md-2 px-md-4 font-weight-semi-bold mt-2"style="width:100%;font-size:17px;"><?php echo $row["tenvaitro"]; ?></a></span>       
                        </a>
                    </div>
                </div>
                <?php } }?>  
            </div>
            <div style="text-align:center;">
            <a href="#" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Xem thêm</a>
            </div>
        </div>
             <div class="row">
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
