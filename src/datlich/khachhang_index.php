<?php 
    include("config.php");

    session_start();
    if(!isset($_SESSION['id_khachhang'])){
      header('Location:../login.php');
     }
     $sql= "SELECT * FROM `tbl_vaitro`";
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
    margin: 0;
    padding: 0;
    background-image: url(admin/images/background_body.jpg);
}


</style>
<?php if(isset($_SESSION['id_khachhang'])==true) { ?>
    <?php
  include("giaodien/topbar.php");
  include("giaodien_user/header_user.php");
 
  ?>    
<?php } ?>
<body >


<br>
<?php
    // include("giaodien_quanly/about.php");
    include("giaodien/carousel.php");

  ?>
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
<div class="container-fluid py-5">
    <div class="container pt-3 pb-3">
        <div class="text-center mb-3">  
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Danh mục</h5>
            <form method="GET" action="search.php" class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm lịch hẹn" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div class="row pb-3">
            <?php if(mysqli_num_rows($res)>0){ ?>
                <?php while($row=mysqli_fetch_assoc($res)) {  ?>
                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2 center">
                        <span><a href="khachhang_datlich.php?id_vaitro=<?php echo $row["id_vaitro"]; ?>" class="btn btn-success py-md-2 px-md-4 font-weight-semi-bold mt-2" style="width:100%;font-size:17px;"><?php echo $row["tenvaitro"]; ?></a></span>       
                    </div>
                </div>
                <?php } } ?>  
        </div>
    </div>
</div>

<?php
  include("giaodien/footer.php");
  ?>
</html>
