
<?php  $request_uri= $_SERVER['REQUEST_URI'];?>

    <!-- New-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">
            ĐẶT LỊCH
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav" style="margin-left:10%;">
                <li class="nav-item <?php if((strpos($request_uri,"index.php")!==false)){echo "active";}?>">
                <a href="index.php" class="nav-item nav-link ">Trang chủ</a>
                </li>
                <li class="nav-item <?php if((strpos($request_uri,"giaovien.php")!==false)){echo "active";}?>">
                <a href="login.php" class="nav-item nav-link">Đăng nhập</a>
                </li>
                <li class="nav-item <?php if((strpos($request_uri,"baiviet.php")!==false)){echo "active";}?>">
                <a href="signup.php" class="nav-item nav-link">Đăng ký</a>
                </li>
            </ul>
            
        </div>
</div>
</nav>

      