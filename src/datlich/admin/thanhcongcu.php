<?php include("config.php");
$request_uri= $_SERVER['REQUEST_URI'];

?>
<style>
.widget-menu {
	background: #fff;
	
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	
	overflow: hidden
}
.widget-menu a {
	color: #555;
	display: block;
	line-height: 20px;
	padding: 15px;
	text-decoration: none!important
}
.widget-menu .menu-icon {
	 
	margin-right: 10px;
	 
	color: black;
	-webkit-transition: all .2s ease-in-out;
	-moz-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
}
.widget-menu .label {
	background: #888;
	-webkit-box-shadow: 0 0 2px rgba(0,0,0,0.4) inset;
	-moz-box-shadow: 0 0 2px rgba(0,0,0,0.4) inset;
	box-shadow: 0 0 2px rgba(0,0,0,0.4) inset;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	line-height: 20px;
	padding: 0 5px
}
.widget-menu .label.green {
	background: #78ba00
}
.widget-menu .label.orange {
	background: #d74f2a
}
.widget-menu>li+li {
	border-top: 1px solid #555
}
.widget-menu>li>a {
	background-color: white;
	color: black;
	-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
transition: all .2s ease-in-out;
}

.widget-menu>li>a .icon-chevron-up {
	display: block
}
.widget-menu>li>a .icon-chevron-down {
	display: none
}
.widget-menu>li>a.collapsed .icon-chevron-up {
	display: none
}
.widget-menu>li>a.collapsed .icon-chevron-down {
	display: block
}
.widget-menu>li>a:hover {
	background-color: #28262c;
	color: #fafafa;
}

.widget-menu>li>a:hover .menu-icon { color:#fff;}

.widget-menu>li ul li {
	background: #eee;
	border-top: 1px solid #ccc
}
.widget-menu>li ul li+li {
	border-top: 0
}
.widget-menu>.active a {
	background-color: #aa135e;
    color:white
}
.widget-menu>.active .menu-icon { color:#fff;}


.widget-menu>li ul li a {
	padding: 10px 15px 10px 30px
}
.widget-menu>li ul li a:hover {
	background: #f5f5f5;
	-webkit-box-shadow: 0 1px 0 #fafafa inset;
	-moz-box-shadow: 0 1px 0 #fafafa inset;
	box-shadow: 0 1px 0 #fafafa inset;
	border-bottom: 1px solid #d5d5d5;
	border-top: 1px solid #d5d5d5;
	padding: 9px 15px 9px 30px
}

.widget-usage {
background-color: #fff;
border: 1px solid transparent;
border-radius: 4px;
-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
box-shadow: 0 1px 1px rgba(0,0,0,.05);

text-decoration: none!important;
}
.widget-usage p {
	margin-bottom: 10px;
	line-height: 1.2
}
.widget-usage li {
	padding: 15px
}
.widget-usage li+li {
	border-top: 1px solid #ddd
}

</style>
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled ">
                                <li class="<?php if((strpos($request_uri,"index.php")!==false)){echo "active";}?>"><a href="index.php"style="font-weight:bold;">Trang chủ</a>
                                </li>

                                <li class="<?php if((strpos($request_uri,"quanlybanner.php")!==false)){echo "active";}?>"><a href="quanlybanner.php"style="font-weight:bold;"></i>Quản lý Banner</a>
                                </li>

                                <li class="<?php if((strpos($request_uri,"chonvaitro.php")!==false || strpos($request_uri,"duyetadmin.php")!==false)){echo "active";}?>"><a href="chonvaitro.php" style="font-weight:bold;">Duyệt tài khoản Quản lý</a>
								</li>

                                <li class="<?php if((strpos($request_uri,"quanlydanhmuc.php")!==false)){echo "active";}?>"><a href="quanlydanhmuc.php"style="font-weight:bold;">Quản lý danh mục</a>
                                </li>
                                
                                <!-- <li class="<?php if((strpos($request_uri,"quanlyphanquyen.php")!==false)){echo "active";}?>"><a href="quanlyphanquyen.php" style="font-weight:bold;">Quản lý phân quyền</a>
                                </li> -->
                            </ul>
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li class="<?php if((strpos($request_uri,"doimatkhau.php")!==false)){echo "active";}?>"><a href="doimatkhau.php?admin=<?php echo $_SESSION['username1'];?>" style="font-weight:bold;"><i class="menu-icon fas fa-key"></i> Đổi mật khẩu</a></li>
                                
                                <li><a href="logout.php?admin=<?php echo $_SESSION['username1'];?>" style="font-weight:bold;"><i class="menu-icon icon-signout"></i>Đăng xuất</a></li>
                            </ul>
                        </div>
                      
                    </div>
