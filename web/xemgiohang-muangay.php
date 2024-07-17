<!DOCTYPE html>
<html lang="en">
<?php include 'dautrang.php' ?>
        <header>
            <a class="logo" href="index.php"><img src="logo.png" alt="Logo"></a>
            <form style="margin-left: 200px;" action="timkiem.php" method="get">
                <input style="width: 300px;" type="text" name="find" placeholder="Tìm kiếm...">&nbsp;&nbsp;<i class="material-icons">search</i>
            </form>
            <!-- <a id='ButtonNAV' style="margin-left: 50px; padding: 10px; color: white;" href='giohang.php' target='_blank'><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</a> -->
        </header>

    <body>
        <!-- Navigation -->
        <nav>
            <ul>
                <li><a href="trangchu.php"><i class="material-icons">home</i> Trang Chủ</a></li>
                <li>
                    <a href="#">
                        <i class="material-icons">book</i> Tin Tức<i class="material-icons">arrow_drop_down</i>
                    </a>
                    <ul>
                        <li><a href="#"><i class="material-icons">book</i> Tin Công Nghệ</a></li>
                        <li><a href="#"><i class="material-icons">book</i> Tin Đặc Biệt</a></li>
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
    <article id="bookinfo"> 
    <form action="xemgiohang-muangay.php" method="post">
	<table >
    <?php
                    error_reporting(0);
                    if(isset($_POST['btnXoaMuaNgay']))
                    {
                        echo "<p class='c6' style='width:100%' align='center'>Bạn chưa chọn sản phẩm mua. Quay lại Trang chủ để chọn sản phẩm </p>";
                    }
                    else
                    {
                    echo "<caption class='caption-noidung'> THÔNG TIN GIỎ HÀNG </caption>";
                    $truyvan="SELECT * FROM SANPHAM AS S, NHACUNGCAP AS N WHERE S.MASP='".$_SESSION['masp']."' AND 
                            S.MANCC=N.MANCC";
                    $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                    $dong=mysqli_fetch_array($ketqua);
                    
                    $_SESSION['SL']=$_POST['txtSL'];
                    $Tien=$_SESSION['SL'] * $dong['GIA'];
                    if(empty($_POST['txtSL']))
                        { 
                            $_SESSION['SL'] =1; 
                            $Tien=$_SESSION['SL'] * $dong['GIA'];
                        }
                    echo "<tr class='tr-giohang'> <th class='td-giohang'> STT </th> <th class='td-giohang' colspan='2'> Thông tin sản phẩm mua </th> <th class='td-giohang'> Giá tiền </th> <th class='td-giohang' colspan='2'align='center'>Số lượng </th> <th class='td-giohang'>Thành tiền </th> </tr>";
                    echo "<tr class='tr-giohang'> <td class='td-giohang'> 1 </td> <td class='td-giohang' > <img src='".$dong['HINH']."'></th> 
                            <th class='td-giohang'>".$dong['TENSP']." <br> <br> Nhà cung cấp:".$dong['TENNCC']." </th>  
                            <th class='td-giohang'>".number_format($dong['GIA'])." đồng </th> 
                            <th class='td-giohang'> <input  type='number' min='1'  oninput='validity.valid||(value='');' name='txtSL' value=".$_SESSION['SL']." > </th>
                                <th class='td-giohang'>    <button class='c2' name='btnXoaMuaNgay'> Xóa Sản Phẩm </button> </th>
                            <th class='td-giohang'> ".number_format($Tien)." đồng </th>
                        </tr>";
                    echo "<tr class='tr-giohang'> <th class='td-giohang' colspan='6'> Tổng tiền </td> <th class='td-giohang'>".number_format($Tien)." đồng </th> </tr>";   
                    echo "<tr class='tr-giohang' > <th class='' colspan='3' id='c9'> <button class='c2' name='btnThanhToanMuaNgay'> Thanh toán </button> </th>
                            <th class='' colspan='2' id='c9'> <input type='submit' class='c2' name='btnCapNhatMuaNgay' value='Cập nhật giỏ hàng'> </td> </th>";
                    
                    if (isset($_POST['btnThanhToanMuaNgay']))
                        {
                            header('Location: giohangmuangaychitiet.php');
                        }  
                    }
                ?>
	</table>
	</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>