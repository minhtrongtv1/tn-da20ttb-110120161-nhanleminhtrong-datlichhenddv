<?php
include("config.php");
session_start();
if(!isset($_SESSION['id_quanly'])){
    header('Location:../login.php');
}

$id_lichhen = $_GET['id_lichhen'];
$sql = "SELECT * FROM tbl_lichhen WHERE id_lichhen='$id_lichhen'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if(!$row) {
    die('Appointment not found');
}

$msg = "";

if(isset($_POST['submit'])){
    $tenquanly = $_POST['tenquanly'];
    $tenlichhen = $_POST['tenlichhen'];
    $malichhen = $_POST['malichhen'];
    $thoigianlamviec = $_POST['thoigianlamviec'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $diachi = $_POST['diachi'];
    $tencoquan = $_POST['tencoquan'];
    $gio = $_POST['gio'];
    $ngay = $_POST['ngay'];
    
    if($hinhanh) {
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../admin/images/".$_FILES['hinhanh']['name']);
        $sql_update = "UPDATE tbl_lichhen SET tenquanly='$tenquanly', tenlichhen='$tenlichhen', malichhen='$malichhen', thoigianlamviec='$thoigianlamviec', hinhanh='$hinhanh', tomtat='$tomtat', noidung='$noidung', diachi='$diachi', tencoquan='$tencoquan', gio='$gio', ngay='$ngay' WHERE id_lichhen='$id_lichhen'";
    } else {
        $sql_update = "UPDATE tbl_lichhen SET tenquanly='$tenquanly', tenlichhen='$tenlichhen', malichhen='$malichhen', thoigianlamviec='$thoigianlamviec', tomtat='$tomtat', noidung='$noidung', diachi='$diachi', tencoquan='$tencoquan', gio='$gio', ngay='$ngay' WHERE id_lichhen='$id_lichhen'";
    }
    
    if(mysqli_query($connection, $sql_update)){
        $msg="<script language='javascript'>
            swal(
                'Thành công!',
                'Đã chỉnh sửa!',
                 'success'      
                 );
                 var timer = setTimeout(function() {
                  window.location=('lichhen.php')
              }, 2000);
      </script>";  
    } else {
        $msg = "Error updating record: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sửa lịch hẹn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        .buttonsua {
            background-color: #58257b;
            border: none;
            font-weight: bold;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: auto;
            font-size: 15px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 4px;
        }
        .buttonsua {
            background-color: white;
            color: black;
            border: 2px solid green;
        }
        .buttonsua:hover {
            background-color: green;
            color: white;
        }
        .a {
            background: #fff;
            margin: 5px 0px;
            margin-bottom: 25px;
            color: #000000;
            box-sizing: border-box;
            display: block;
            width: 100%;
            border-width: 1px;
            border-style: solid;
            padding: 13px;
            outline: none;
            font-family: inherit;
            font-size: 0.95em;
        }
    </style>
</head>
<body>
<div class="container-fluid"> 
    <div class="container"> 
        <div class="col-md-8 container"> 
            <div class="bg-secondary rounded p-5">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 
                    <?php echo $msg; ?>
                    <div class="hinh">
                        <h1 style="text-align: center; background-color:#F2F1F8; color:#000000;">Sửa lịch hẹn</h1>      
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="text" class="form-control" readonly value="<?php echo ucwords($row['tenquanly']); ?>">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="tenlichhen" value="<?php echo $row['tenlichhen']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="malichhen" value="<?php echo $row['malichhen']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="thoigianlamviec" value="<?php echo $row['thoigianlamviec']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="tomtat" value="<?php echo $row['tomtat']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <textarea type="text" class="form-control" name="noidung" required><?php echo $row['noidung']; ?></textarea>
                    </div>
                    <br>
                    <!-- <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="text" class="form-control" readonly value="<?php echo ucwords($row['tenvaitro']); ?>">
                    </div> -->
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="file" class="a" name="hinhanh">
                        <br>
                        <img src="../admin/images/<?php echo $row['hinhanh']; ?>" width="100">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="diachi" value="<?php echo $row['diachi']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="tencoquan" value="<?php echo $row['tencoquan']; ?>" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <select class="form-control" name="gio" required>
                            <option value="7h00" <?php if($row['gio'] == '7h00') echo 'selected'; ?>>7h00-8h00</option>
                            <option value="8h00-9h00" <?php if($row['gio'] == '8h00-9h00') echo 'selected'; ?>>8h00-9h00</option>
                            <option value="9h00-10h00" <?php if($row['gio'] == '9h00-10h00') echo 'selected'; ?>>9h00-10h00</option>
                            <option value="10h00-11h00" <?php if($row['gio'] == '10h00-11h00') echo 'selected'; ?>>10h00-11h00</option>
                            <option value="13h00-14h00" <?php if($row['gio'] == '13h00-14h00') echo 'selected'; ?>>13h00-14h00</option>
                            <option value="14h00-15h00" <?php if($row['gio'] == '14h00-15h00') echo 'selected'; ?>>14h00-15h00</option>
                            <option value="15h00-16h00" <?php if($row['gio'] == '15h00-16h00') echo 'selected'; ?>>15h00-16h00</option>
                            <option value="16h00-17h00" <?php if($row['gio'] == '16h00-17h00') echo 'selected'; ?>>16h00-17h00</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="date" class="form-control" name="ngay" value="<?php echo $row['ngay']; ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit" class="buttonsua">Sửa lịch hẹn</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
