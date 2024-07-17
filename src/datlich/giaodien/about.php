<div class="container-fluid">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="admin/images/nen.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px; text-align:center;">Thông báo</h5>
                    </div>
                    <?php 
                        include('config.php');
                        $sql_tb="SELECT * FROM thongbao";
                        $res_tb=mysqli_query($connection, $sql_tb);
                        if(mysqli_num_rows($res_tb)>0){ ?>
                            <?php while($row_tb=mysqli_fetch_assoc($res_tb)){ ?>
                            <div><i class="fas fa-angle-double-right"></i>&ensp;<a style="font-size: 20px; color:#000000;" href="thongbao.php?id_thongbao=<?php echo $row_tb['id_thongbao']?>"><?php echo $row_tb['tieude']?></a></div>
                            <?php } 
                        }else{
                            echo '<div style="text-align:center;">Không có thông báo nào!</div>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>