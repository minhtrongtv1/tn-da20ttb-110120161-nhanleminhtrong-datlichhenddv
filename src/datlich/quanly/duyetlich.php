<?php
include("config.php");
require('../vendor/phpmailer/sendmail.php');
session_start();
if (!isset($_SESSION['id_quanly'])) {
    header('Location:../login.php');
    exit(); // Thoát khỏi script sau khi chuyển hướng
}

$id_lichhen = $_GET['id_lichhen'];
$id_quanly = $_SESSION['id_quanly'];

// Cập nhật trạng thái duyệt lịch hẹn
$sql_trangthai_duyet = "UPDATE `tbl_lichhen` SET trangthai_duyet='1' WHERE id_lichhen='$id_lichhen' AND id_quanly='$id_quanly'"; 
$res_trangthai_duyet = mysqli_query($connection, $sql_trangthai_duyet);

// Lấy thông tin chi tiết đơn hàng chưa được duyệt
$sqlorder = "SELECT * FROM `tbl_booking` WHERE id_lichhen='$id_lichhen' AND id_quanly='$id_quanly' AND duocduyet = 0";
$res = mysqli_query($connection, $sqlorder);

// Lấy thông tin từ bảng tbl_lichhen
$sqlql = "SELECT * FROM `tbl_lichhen` WHERE `id_quanly` = '$id_quanly' AND id_lichhen='$id_lichhen'";
$resultql = mysqli_query($connection, $sqlql);
if (mysqli_num_rows($resultql) > 0) {
    $row = mysqli_fetch_assoc($resultql);
    $gio = $row['gio'];
    $malichhen = $row['malichhen'];
    $_SESSION['gio'] = $gio;
    $_SESSION['malichhen'] = $malichhen;
}

// Xử lý khách hàng mới đặt lịch
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id_khachhang = $row['id_khachhang'];

        // Cập nhật trạng thái duyệt cho khách hàng hiện tại
        $sql1 = "UPDATE `tbl_booking` SET duocduyet='1' WHERE id_lichhen='$id_lichhen' AND id_quanly='$id_quanly' AND id_khachhang='$id_khachhang'"; 
        $res1 = mysqli_query($connection, $sql1);

        if ($res1) {
            // Lấy thông tin khách hàng
            $sqllichhen = "SELECT * FROM `tbl_khachhang` WHERE id_khachhang='$id_khachhang'";
            $resultlh = mysqli_query($connection, $sqllichhen);
            if (mysqli_num_rows($resultlh) > 0) {
                $row_khachhang = mysqli_fetch_assoc($resultlh);
                $email = $row_khachhang['email'];

                // Gửi email thông báo
                $mail = new Mailer();
                $mail->datlichmail(
                    'Thông báo xác nhận đặt lịch',
                    'Khách hàng đã đặt lịch thành công với' . "\n" .
                    'Mã lịch hẹn: ' . $_SESSION['malichhen'] . "\n" .
                    'Giờ đặt: ' . $_SESSION['gio'] . "\n" .
                    'Thêm nội dung email ở đây',
                    $email
                );
            }
        } else {
            $msg = "<script language='javascript'>
                swal(
                    'Thất bại!',
                    'Không thể duyệt lịch hẹn!',
                    'error'      
                );
                var timer = setTimeout(function() {
                    window.location=('xemlichhen.php?id_lichhen=$id_lichhen')
                }, 2000);
            </script>";
        }
    }

    // Thông báo thành công và chuyển hướng
    $msg = "<script language='javascript'>
        swal(
            'Thành công!',
            'Đã duyệt lịch hẹn!',
            'success'      
        );
        var timer = setTimeout(function() {
            window.location=('xemlichhen.php?id_lichhen=$id_lichhen')
        }, 2000);
    </script>";
} else {
    // Nếu không có khách hàng mới đặt lịch nào
    $msg = "<script language='javascript'>
        swal(
            'Thông báo!',
            'Không có khách hàng mới đặt lịch hẹn!',
            'info'      
        );
        var timer = setTimeout(function() {
            window.location=('xemlichhen.php?id_lichhen=$id_lichhen')
        }, 2000);
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dịch vụ đặt lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php echo $msg; ?>
</body>
</html>
