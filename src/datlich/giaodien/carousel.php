<?php
    
    include("config.php");
     $sql41= "SELECT * FROM `banner` WHERE id_banner='1'";
     $res41=mysqli_query($connection,$sql41);
     $row41= mysqli_fetch_assoc($res41);

     $sql42= "SELECT * FROM `banner` WHERE id_banner='2'";
     $res42=mysqli_query($connection,$sql42);
     $row42= mysqli_fetch_assoc($res42);

     $sql44= "SELECT * FROM `banner` WHERE id_banner='3'";
     $res44=mysqli_query($connection,$sql44);
     $row44= mysqli_fetch_assoc($res44);

?>

<div class="container-fluid p-0  ">
<div class="container-fluid">
        <div id="header-carousel" class="carousel slide carousel-fade" style="text-align:center;" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
                <!-- <li data-target="#header-carousel" data-slide-to="3"></li> -->

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="position-relative" src="admin/images/<?php echo $row41["banner"]; ?>" style="width: 80%; height:50%;">
                </div>
                <div class="carousel-item">
                    <img class="position-relative" src="admin/images/<?php echo $row42["banner"]; ?>" style="width: 70%; height:50%;">
                </div>
                <div class="carousel-item">
                    <img class="position-relative" src="admin/images/<?php echo $row44["banner"]; ?>" style="width: 80%; height:50%;">
                </div>
            </div>
        </div>
    </div>
    </div>