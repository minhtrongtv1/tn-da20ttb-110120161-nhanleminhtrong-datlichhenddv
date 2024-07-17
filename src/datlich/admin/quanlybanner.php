<?php

    session_start();
    if(!isset($_SESSION['username1'])){
     header('Location:admin_login.php');
    } 

    include("config.php");
    $sql1= "SELECT * FROM `banner`"; 
    //echo $sql;
    $res1= mysqli_query($connection,$sql1);
     
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đặt lịch hẹn đa dịch vụ</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
			<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
<style>
.buttonsua {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: auto;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonsua {  background-color: white;   color: black;   border: 2px solid green;}
.buttonsua:hover {  background-color: green;  color: white;}
.buttonxoa {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold; color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block; width: 120px;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonxoa {  background-color: white;   color: black;   border: 2px solid red;}
.buttonxoa:hover {  background-color: red;  color: white;}
.buttonthem {  background-color: #58257b; /* Màu của Quản trị mạng ^^ */  border: none; font-weight:bold;  color: white;  padding: 10px 24px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 15px;  margin: 4px 2px;  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;  cursor: pointer;  border-radius: 4px;}
.buttonthem {  background-color: white;   color: black;   border: 2px solid #17a2b8;}
.buttonthem:hover {  background-color: #17a2b8;  color: white;}
.btn-info {
	color: #fff;
	background-color: #6666ff;
	border-color: #6666ff
}
h3{
    color:#fff;
}
</style>
    <body>
    <?php
    include('../admin/navbar.php');
    ?>
<div class="wrapper nen">
    <div class="container">
        <div class="row">
    <?php
    include('../admin/thanhcongcu.php');
    ?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3 >Banner</h3>
                            </div>
                                <div class="module-body">
                                <div style="text-align:center;">
                                <a class="btn btn-success" href="thembanner.php">Thêm</a>
                            </div>  
                        <br>
                                <?php 
                                $n="";
                                while($row1=mysqli_fetch_assoc($res1)) {  
                                $n++;    
                                ?>
                                <section class="docs"style="text-align: justify;">
                                <div style="text-align:center;">
                                Hình <?php echo $n;?>  
                                <img src="../admin/images/<?php echo $row1['banner'] ?>"width="250px"><br><br>
                                </div>
                                </section>
                                <div style="text-align:center;">
                                    <a class="btn btn-warning" href="suabanner.php?id_banner=<?php echo $row1['id_banner'];?>">Chỉnh sửa</a>&ensp;
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa Banner này?')" href="xoabanner.php?id_banner=<?php echo $row1['id_banner'];?>">Xóa</a>
                                </div> 
                            <br>       
                                <?php }	?>
                               

                                <div>
                            
                        </div>
                    </div>
                </div>
 
        </div>
    </div>
</div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
</html>