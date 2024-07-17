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
		<table>
        <h2> &nbsp;Kết quả tìm kiếm cho từ khóa: <?php echo $_GET['find']; ?></h2>
        <?php
        $find = $_GET['find'];
        $truyvan="SELECT * FROM SANPHAM AS S, LOAI AS L WHERE S.MATL=L.MATL AND (TENSP LIKE '%$find%' OR TENTL LIKE '%$find%')";
        $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
        $tongdong = mysqli_num_rows($ketqua);
        if ($tongdong == 0) {
            echo "<tr><th colspan='3'><h2>Không tìm thấy kết quả nào.</h2></th></tr>";
        } else {
            $row_count = 0;
            while ($dong = mysqli_fetch_array($ketqua)) {
                $row_count++;
                if ($row_count % 3 == 1) {
                    echo "<tr>";
                }
                echo "<th class='wow bounceInUp'> <img src='".$dong[ 'HINH']."'> <br> <br> ".$dong['TENSP']."
                <br> <p id='redcolor'>Giá bán : ".number_format($dong['GIA'])." đồng <br>

                <br> <button class='c2' type='button' name='btnXem'><a href='xemnoidung.php?masp=".$dong['MASP']."'> Mua Ngay </a> </button> </th>";
                if ($row_count % 3 == 0) {
                    echo "</tr>";
                }
            }
            if ($row_count % 3 != 1) {
                echo "</tr>";
            }
        }
            ?>
            </table>
		</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>