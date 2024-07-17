<?php
    include("config.php");
    $sql_ten="SELECT * FROM tbl_khachhang WHERE id_khachhang='$_SESSION[id_khachhang]'";
    $res_ten=mysqli_query($connection,$sql_ten);
    $row_ten=mysqli_fetch_array($res_ten);

    $request_uri= $_SERVER['REQUEST_URI'];
?>
    <!-- New-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="index_gv.php" style="font-weight:bold; font-size: 30px;">
            ĐẶT LỊCH
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="margin-right: 5%;">
                <li class="nav-item <?php if((strpos($request_uri,"khachhang_index.php")!==false)){echo "active";}?>">
                <a href="khachhang_index.php" style="font-weight:bold;"  class="nav-item nav-link ">Trang chủ</a>
                </li>
                <li class="nav-item <?php if((strpos($request_uri,"user_lichdahen.php")!==false)){echo "active";}?>">
                <a href="khachhang_lichdahen.php" style="font-weight:bold;"  class="nav-item nav-link">Lịch đã hẹn</a>
                </li>
                <li class="nav-item <?php if((strpos($request_uri,"user_lichsudatlich.php")!==false)){echo "active";}?>">
                <a href="lichsudatlich.php" style="font-weight:bold;"  class="nav-item nav-link">Lịch sử đặt lịch</a>
                </li>
               
            </ul>
            <ul class="navbar-nav" style="margin-right: 5%; ">
            <!-- Dropdown -->
                <li class="nav-item dropdown <?php if((strpos($request_uri,"user_canhan.php")!==false)){echo "active";}?>">
                    <a class="nav-link dropdown-toggle" style="font-weight:bold;" id="navbardrop" data-toggle="dropdown">
                    Tài khoản
                    </a>
                    <div class="dropdown-menu">
                    <a href="user_canhan.php?hocvien=<?php echo $_SESSION['id_khachhang']; ?>" style="font-weight:bold;color:red;"  class="dropdown-item"> <?php echo ucwords($row_ten['hovaten']) ?></a>
                    <a class="dropdown-item btn btn-primary py-2 px-4 ml-auto  d-lg-block" href="logout.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
</div>
</nav>                        

                           
