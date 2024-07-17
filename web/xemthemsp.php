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
    <article class="wow fadeIn" id="bookinfo"> 
    <form action="xemgiohang-muangay.php" method="post">
	<table class='banggiohang' align='center'>
    <?php
        function HienThiSP($ketqua)
        {
            for($j=1;$j<=3;$j++) {
                $noidung = mysqli_fetch_array($ketqua);
                if(isset($noidung)) {
                    echo "<th class='wow bounceInUp' style='width: 25%; margin-top: 10px;'><img src='".$noidung['HINH']."'> <br> <br> ".$noidung['TENSP']."
                    <br> <p id='redcolor'>Giá: ".$noidung['GIA']." VNĐ<br>
                    <br> <button class='c2' type='button' name='btnXem'><a href='xemnoidung.php?masp=".$noidung['MASP']."'><i class='fa-solid fa-cart-shopping'></i> Mua Ngay </a> </button> </th>";
                }
            }
        }
        
        $tenloai = $_GET['loai'];
        $truyvan = "SELECT * FROM SANPHAM S, LOAI AS L WHERE S.MATL=L.MATL AND TENTL='".$tenloai."'";
        $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
        $sl = mysqli_num_rows($ketqua);
        $sodong = $sl/3;

        $tongdong = mysqli_num_rows($ketqua);
        $tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
        $soluong = 2;
        $tongsotrang = ceil($tongdong / $soluong);

        if($sodong <= 3) { 
            HienThiSP($ketqua);
        }
        else { 
            if($tranghientai > $tongsotrang) {
                $tranghientai = $tongsotrang;
            }
            else if($tranghientai < 1) {
                $current_page = 1;
            }
            $batdau = ($tranghientai - 1) * $soluong;
            $truyvan = "SELECT * FROM SANPHAM S, LOAI AS L WHERE S.MATL=L.MATL AND TENTL='".$tenloai."' LIMIT $batdau, $soluong";
            $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_query($conn)); 
            HienThiSP($ketqua);
        }
        $noidung1 = mysqli_fetch_array($ketqua);
        echo '<tr><td colspan="5" rowspan="5">';
        if($tranghientai > 1 && $tongsotrang > 1) {
            echo '<a class="btnbuy" href="xemthemsp.php?loai='.$noidung1['TENTL'].'&trang='.($tranghientai-1).'">Trang trước &nbsp; </a>';
        }
        for($i=1;$i<=$tongsotrang;$i++) {
            if($i == $tranghientai) {
                echo '<span class="btnpage">'.$i.'</span>';
            }
            else {
                echo '<a class="btnpage" href="xemthemsp.php?loai='.$noidung1['TENTL'].'&trang='.$i.'">&nbsp;'.$i.'&nbsp;</a>';
            }
        }
        if($tranghientai < $tongsotrang && $tongsotrang > 1){
            echo '<a class="btnbuy" href="xemthemsp.php?loai='.$noidung1['TENTL'].'&trang='.($tranghientai+1).'">Trang tiếp theo &nbsp; </a>';
        }
        echo '</tr></td>';
        ?>
        
    </table>
	</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>