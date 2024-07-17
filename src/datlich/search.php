<?php
include("config.php");

session_start();
if(!isset($_SESSION['id_khachhang'])){
    header('Location:../login.php');
}

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$keyword = mysqli_real_escape_string($connection, $keyword);

$sql = "SELECT * FROM `tbl_lichhen` WHERE `tenlichhen` LIKE '%$keyword%' OR `tenquanly` LIKE '%$keyword%'";
$res = mysqli_query($connection, $sql);

// Kiểm tra xem truy vấn có thành công không
if ($res === false) {
    echo "Error: " . mysqli_error($connection);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tìm kiếm lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
body{
    margin: 0;
    padding: 0;
    background-image: url(admin/images/background_body.jpg);
}
</style>
<body>
<?php include("giaodien/topbar.php"); ?>
<?php include("giaodien_user/header_user.php"); ?>
<div class="container-fluid py-5">
    <div class="container pt-3 pb-3">
        <div class="text-center mb-3">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: normal;">Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($keyword); ?>"</h5>
        </div>
        <div class="row pb-3">
            <?php if(mysqli_num_rows($res) > 0) { ?>
                <?php while($row = mysqli_fetch_assoc($res)) { ?>
                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                        <h5 class="text-center"><?php echo $row["tenlichhen"]; ?></h5>
                        <p><?php echo $row["tenquanly"]; ?></p>
                        <a href="chitiet_lichhen.php?id=<?php echo $row["id_lichhen"]; ?>" class="btn btn-success py-md-2 px-md-4 font-weight-semi-bold mt-2" style="width:100%;font-size:17px;">Xem chi tiết</a>
                    </div>
                </div>
                <?php } ?>
            <?php } else { ?>
                <p>Không tìm thấy kết quả nào cho từ khóa "<?php echo htmlspecialchars($keyword); ?>"</p>
            <?php } ?>
        </div>
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
