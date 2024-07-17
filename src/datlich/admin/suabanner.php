<?php
    include("config.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['username1'])){
        header('Location:admin_login.php');
       } 
    $sql1= "SELECT * FROM `banner` WHERE id_banner='$_GET[id_banner]' "; 
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
                                <h3>Sửa banner</h3>
                            </div>
                            <div class="module-body">
                            <?php 
        					while ($row1= mysqli_fetch_assoc($res1)){
          					?>
                            
                    <form action="updatebanner.php?id_banner=<?php echo $_GET['id_banner'] ?>" method="post" enctype="multipart/form-data"  >
                    
                    <div style="text-align:center;">
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Hình</label>
											<div class="controls">
                      							<input data-title="A tooltip for the input" type="file" name="banner" class="span8 tip">
                                                <input data-title="A tooltip for the input" type="hidden" name="bannercu" class="span8 tip" value="<?php echo $row1['banner'] ?>"><img src="../admin/images/<?php echo $row1['banner'] ?>"width="250px">
                                            </div>
										</div>
                                        
                                        <br>
                    					<div class="control-group" style="text-align:center;">       
											<div class="controls">
                                            <button  type="submit " class="btn btn-success "  name="suabanner">Cập nhật</button>
                                            </div>                  
										</div>
                            </div>
                          
					</form>
                            
                  			<?php 
                    			}
                  			?>
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	    <script>
        CKEDITOR.replace('noidung');
    </script>
    </body>
</html>