<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['username1'])){
      header('Location:admin_login.php');
     }

	 include("config.php");
    $msg= "" ;     
    
    
?>
<?php
$sql_sua_vt="SELECT * FROM tbl_vaitro WHERE id_vaitro='$_GET[id_vaitro]' LIMIT 1";
$query_sua_vt= mysqli_query($connection,$sql_sua_vt);
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đặt lịch hẹn đa dịch vụ trực tuyến</title>
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
h3{
    color:#fff;
}</style>
<body>
<?php
    include('../admin/navbar.php');
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
    <?php
    include('../admin/thanhcongcu.php');
    ?>
<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Sửa danh mục</h3>
							</div>
							<div class="module-body">
              					<?php 
        					while ($row= mysqli_fetch_assoc($query_sua_vt)){
          
          						?>
                    <form action="updatedanhmuc.php?id_vaitro=<?php echo $_GET['id_vaitro'] ?>" method="post" enctype="multipart/form-data"  >
                    					<div class="control-group">
											<label class="control-label" for="basicinput">Tên danh mục</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="tenvaitro" value="<?php echo $row['tenvaitro']?>" data-original-title="" class="span8 tip">
											</div>
										</div>

										<div class="control-group" style="text-align:center;">
											<div class="controls">
												<button type="submit" class="btn btn-success" name="suadanhmuc">Cập nhật</button>
											</div>
										</div>
									</form>
                  			<?php 
                    			}
                  			?>

							</div>
						</div>

						
						
					</div><!--/.content-->
				</div>

</body>
</html>