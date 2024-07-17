<!DOCTYPE html>
<html lang="en">
<?php include 'dautrang.php' ?>
        <header class="wow fadeIn">
            <a class="logo" href="index.php"><img src="logo.png" alt="Logo"></a>
            <form style="margin-left: 200px;" action="timkiem.php" method="get">
                <input style="width: 300px;" type="text" name="find" placeholder="Tìm kiếm...">&nbsp;&nbsp;<i class="material-icons">search</i>
            </form>
             <!-- <a id='ButtonNAV' style="margin-left: 50px; padding: 10px; color: white;" href='giohang.php' target='_blank'><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</a> -->
        </header>

    <body>
        <!-- Navigation -->
        <nav class="wow fadeIn">
            <ul>
                <li><a href="trangchu.php"><i class="material-icons">home</i> Trang Chủ</a></li>
                <li>
                    <a href="#">
                        <i class="material-icons">book</i> Tin Tức<i class="material-icons">arrow_drop_down</i>
                    </a>
                    <ul>
                        <li><a href="#"><i class="material-icons">book</i> Tin Công Nghệ</a></li>
                    </ul>
                </li>
                <?php include 'phanquyen.php' ?>
            </ul>
        </nav>

    <?php
		include 'ketnoi.php';
		$conn=Moketnoi();
        mysqli_select_db($conn,"EVOLIFESHOPDB");		   
	?>
    <article class="wow fadeIn" id="bookinfo"> 
    <form action="" method="post">
	<table class='banggiohang' align='center'>
    <?php	
    error_reporting(0);
                        $_SESSION['masp']=$_GET['masp'];
                        $truyvan="SELECT * FROM SANPHAM AS S, NHACUNGCAP AS N WHERE S.MASP='".$_SESSION['masp']."' AND 
                                S.MANCC=N.MANCC";
                        $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                        $dong=mysqli_fetch_array($ketqua);
                        echo "<fieldset><legend>THÔNG TIN SẢN PHẨM</legend>
                        <img class='textimage' id='imgcenter' src=".$dong['HINH'].">
                        <h2>". $dong['TENSP'] ."</h2>
                        <h2><a class='badge'>". $dong['GIA'] ." VNĐ</a></h2>
                        <p>
                            <br>Nhà cung cấp: ".$dong['TENNCC']."
                            <br>Chi tiết: ".$dong['NOIDUNG']."
                        </p>
                        </fieldset>";
                    
                        if(!isset($_SESSION['tendangnhap']))
                        {
                            echo "<p class='c6'> Yêu cầu đăng nhập tài khoản để mua </p>";
                        }
                        else
                        {
                            if($_SESSION['loainguoidung']=='user')
                            {
                                echo "<tr> <th class='td-noidung'> <button class='c2' name='btnMuaSanPham'><a href='xemgiohang-muangay.php?masp=".$dong['MASP']."'>Mua Sản Phẩm Ngay</a>  </button> </td> 
                                        <th class='td-noidung'> <button class='c2' name='btnThemGioHang' > Thêm vào giỏ hàng </button> </td></tr>";
                                
                                $n = sizeof($_SESSION['DSMaMua']);
                                if(isset($_POST['btnThemGioHang']))
                                {
                                    if($n==0)
                                    {
                                        array_push($_SESSION['DSMaMua'],$dong['MASP']);
                                        array_push($_SESSION['DSSL'],1);
                                    }
                                    else
                                    {
                                        $kt=0;
                                        $i=0;
                                        while($kt==0 && $i<$n)
                                        {
                                            if(strcmp($_SESSION['DSMaMua'][$i],$dong['MASP'])==0)
                                                $kt=1; 
                                            else
                                                $i++;
                                        }
                                        if($kt==0)
                                        {
                                            array_push($_SESSION['DSMaMua'],$dong['MASP']);
                                            array_push($_SESSION['DSSL'],1);
                                            echo "<p class='c6'> Bạn đã thêm ".$dong['TENSP']. " vào giỏ hàng. Quay lại Trang chủ để tiếp tục hàng </p>";
                                        }
                                        else
                                        {
                                            echo "<p class='c6'> Đã có ".$dong['TENSP']. " trong giỏ hàng. Quay lại Trang chủ để tiếp tục hàng</p>";
                                            
                                        }
                                    }
                                }
                                if(isset($_POST['btnSanPham']))
                                {
                                    $_SESSION['SL']=1;  
                                }
                            }    
                        }
                    ?>    
    </table>
	</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>