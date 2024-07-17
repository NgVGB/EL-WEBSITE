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
    <form id="" action=" " method="post">
	<table border id="" align="center">
    <?php
               
                $truyvan="SELECT * FROM SANPHAM AS S, NHACUNGCAP AS N WHERE S.MASP='".$_SESSION['masp']."' AND 
                         S.MANCC=N.MANCC";
                $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                $dong=mysqli_fetch_array($ketqua);
                
                $Tien=$_SESSION['SL'] * $dong['GIA'];
                $TongTien=$Tien;
                echo "<tr class='tr-giohang'>
                <th class='td-giohang' colspan='1' align='center'> Thông tin sản phẩm mua </th> 
                <th class='td-giohang'> Nhà cung cấp </th> <th class='td-giohang'>Đơn giá </th> ";
                echo "<tr> <th class='td-giohang' > <img style='width: 100%' src='".$dong['HINH']."'></th> 
                 <th class='td-giohang'>".$dong['TENSP']." <br> <br> Nhà cung cấp:".$dong['TENNCC']." </th>  
                 <th class='td-giohang'>".number_format($dong['GIA'])." đồng </th> 
                 </tr>";        
           echo "<tr> <th class='td-giohang' colspan='2' align='center'> Tổng tiền </td> <th class='td-giohang'>".number_format($TongTien)." đồng </th> </tr>"; 
           echo "</table>
           <h2 style='text-align: center;'>Cám ơn bạn đã mua sản phẩm của chúng tôi !!! </h2>";
                
    ?>  
    </table>
	</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>