<?php 
include("config.php");
    $sqlten1= "SELECT * FROM `tbl_quanly` WHERE id_quanly='$_SESSION[id_quanly]'";
    $resten1=mysqli_query($connection,$sqlten1);
    $rowten1=mysqli_fetch_assoc($resten1);

    $sql2= "SELECT * FROM `tbl_quanly` WHERE chucvu ='1' AND id_quanly='$_SESSION[id_quanly]'";
    $res2=mysqli_query($connection,$sql2);
    $row2=mysqli_fetch_assoc($res2);
    if($row2 > 0){
        $i='<li class="nav-item">
        <a class="nav-item nav-link" style="font-weight:bold;" href="../quanly/duyetnhansu.php">Duyệt nhân sự</a>
        </li>';
        $ii='<a class="navbar-brand" href="index_quanly.php" style="font-weight:bold; font-size: 30px;">
            Quản lý nhân sự
        </a>';
    }else{
        $i='<li class="nav-item">
        <a class="nav-item nav-link" style="font-weight:bold;" href="../quanly/taolich.php">Tạo lịch</a>
        </li>
        <li class="nav-item">
        <a href="lichhen.php" style="font-weight:bold;"  class="nav-item nav-link ">Lịch hẹn</a>
        </li>
        <li class="nav-item">
            <a href="lichsulichhen.php" style="font-weight:bold;"  class="nav-item nav-link ">Lịch sử lịch hẹn</a>
        </li>';
        $ii='<a class="navbar-brand" href="index_quanly.php" style="font-weight:bold; font-size: 30px;">
            Nhân viên
        </a>';
    }
?>

   
    <!-- New-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
    <div class="container-fluid">
        <!-- Brand -->
        <?php echo $ii;?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="margin-right: 5%;">
                <li class="nav-item active">
                <a href="index_quanly.php" style="font-weight:bold;"  class="nav-item nav-link active">Trang chủ</a>
                </li>
                <!-- <li class="nav-item">
                <a href="lichhen.php" style="font-weight:bold;"  class="nav-item nav-link ">Lịch hẹn</a>
                </li> -->
                <!-- <li class="nav-item">
                <a href="taolich.php" style="font-weight:bold;"  class="nav-item nav-link">Tạo lịch</a>
                </li> -->
                <?php echo $i;?>
                
                
            </ul>
            <ul class="navbar-nav" style="margin-right: 5%;">
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="font-weight:bold;" id="navbardrop" data-toggle="dropdown">
                Tài khoản
                </a>
                <div class="dropdown-menu">
                <a href="#" style="font-weight:bold;color:red;"  class="dropdown-item"> <?php echo $rowten1['tenquanly']; ?></a>
                <a class="dropdown-item btn btn-primary py-2 px-4 ml-auto  d-lg-block" href="logout.php">Đăng xuất</a>
                </div>
            </li>
            </ul>
        </div>
</div>
</nav>                        
