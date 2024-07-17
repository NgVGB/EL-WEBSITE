<?php
    session_start();
    if(isset($_SESSION['tendangnhap'])&&$_SESSION['tendangnhap'])
    {
        echo "<li><a class='btn1' href='dangxuat.php'>Đăng Xuất</a></li>";
        if(isset($_SESSION["loainguoidung"]) && $_SESSION["loainguoidung"]=='admin')
        {
            echo "";
            echo "<li>
				<a class='btn1'>
                    Quản trị Website
				</a>
				<ul>
                    <a href='quanliuser.php'>Quản lý người dùng</a>
				</ul>
			</li>";
        }
        if(isset($_SESSION["loainguoidung"]) && $_SESSION["loainguoidung"]=='user'){
            if(!isset($_SESSION["DSMaMua"]) || !is_array($_SESSION["DSMaMua"])) {
                $_SESSION["DSMaMua"] = array();
            }
            $n = sizeof($_SESSION["DSMaMua"]);
            if($n == 0)
                echo"<li><a href='giohang.php' class='d2'>Xem giỏ hàng</a></li>";
            else
                echo"<li><a href='giohang.php' class='d2'>Xem giỏ hàng ({$n})</a></li>";
        }
        echo"<li><a class='d2'>Xin chào ".$_SESSION['tendangnhap']."</a></li>";
    }
    else{
        echo "<li><a id='ButtonNAV' href='dangnhap.php' target='_blank'><i class='fa-solid fa-lock'></i>&nbsp;&nbsp;Đăng Nhập</a></li>";
        echo "<li><a id='ButtonNAV' href='dangki.php' target='_blank'><i class='fa-solid fa-key'></i>&nbsp;&nbsp;Đăng Ký</a></li>";
    }
?>