<?php
    include("config.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['username1'])){
        header('Location:admin_login.php');
       } 
       $msg="";
    if(isset($_POST['them'])){
        $hinh= $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'],"../admin/images/".$_FILES['hinh']['name']); 
        $insert_query="INSERT INTO `banner`(`id_banner`, `hinh`) VALUES ('','$hinh')";
        $res= mysqli_query($connection,$insert_query);
        if($res=true){
          $msg='<script type="text/javascript">
          $(document).ready(function() {
              swal({
                  title: "Thành công!",
                  text: "Đã thêm banner mới",
                  icon: "success",
                  button: "Ok",
                  
              });
          });
      </script>';
       
        }
        else{
            die('unsuccessful' .mysqli_error($connection));
        }
    }
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
            <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            
    </head>
    <style>
.nen {
 background-image: url("images/carousel-3.jpg");
  height: 500px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
  height: 700px;
}h3{
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
                                <h3>Thêm banner</h3>
                            </div>
                            <div class="module-body">
                            <?php echo $msg;?>
                    <form action="" method="post" enctype="multipart/form-data"  >
                                    <div style="text-align:center;">
                                        <div class="control-group">
											
											<div class="controls">
                      							<input data-title="A tooltip for the input" type="file" name="hinh" class="span8 tip" required>
                                            </div>
										</div>
                                        
                                        <br>
                    					<div class="control-group" style="text-align:center;">       
											<div class="controls">
                                            <button  type="submit " class="btn btn-success" name="them">Thêm</button>
                                            </div>                  
										</div>
                                    </div>
                          
					</form>
                            <div>
                            
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	
	    <script>
        CKEDITOR.replace('noidung');
    </script>
    </body>
</html>