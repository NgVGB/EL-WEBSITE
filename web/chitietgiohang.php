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
		<table border class='thanhtoangiohang' align='center'>
        <caption class="thongtin"><h2>CHI TIẾT HÓA ĐƠN MUA SẢN PHẨM</h2></caption>
        <?php
               $n=sizeof($_SESSION['DSMaMua']);
               echo"<caption class='caption-noidung'> CHI TIẾT HÓA ĐƠN SẢN PHẨM </caption>";
               echo "<tr> <th class='td-giohang'> STT </th> <th class='td-giohang' colspan='2' align='center'> Thông tin sản phẩm mua </th> <th class='td-giohang'> Giá tiền </th> <th class='td-giohang' align='center'>Số lượng </th> <th class='td-giohang'>Thành tiền </th> </tr>";
               $TongTien=0;
               for($i=0;$i<$n;$i++)
               {
               $truyvan="SELECT * FROM SANPHAM AS S, NHACUNGCAP AS N WHERE S.MASP='".$_SESSION['DSMaMua'][$i]."' AND 
               S.MANCC=N.MANCC";
               $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
               $dong=mysqli_fetch_array($ketqua);
               $Tien=$_SESSION['DSSL'][$i] *$dong['GIA'];
               $TongTien+=$Tien;                  
               echo "<tr> <th class='td-giohang' align='center'>".($i+1)." </td> <th class='td-giohang' > <img src='".$dong['HINH']."'></th> 
                 <th class='td-giohang'>".$dong['TENSP']." <br> <br> Nhà cung cấp:".$dong['TENNCC']." </th>  
                 <th class='td-giohang'>".number_format($dong['GIA'])." đồng </th> 
                 <th class='td-giohang' align='center'> ".$_SESSION['DSSL'][$i]."</th>
                 <th class='td-giohang'> ".number_format($Tien)." đồng </th>
                 </tr>";        
           }
           echo "<tr> <th class='td-giohang' colspan='5' align='center'> Tổng tiền </td> <th class='td-giohang'>".number_format($TongTien)." đồng </th> </tr>"; 
           echo "<tr> <th class='' colspan='6' id='c9'> <br> <br>Cám ơn bạn đã mua sản phẩm của chúng tôi !!! </th>";
           $_SESSION['DSSL']=array();
           $_SESSION['DSMaMua']=array();
            ?>  
		</table>
		</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>