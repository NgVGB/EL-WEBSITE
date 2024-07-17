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
    <form action="xulythemsanpham.php" method="post">
		<table border bordercolor="#000000" class="book" align="center">
			<caption style="font-size: 30px; padding-top: 10px; padding-bottom: 10px;"> THÊM SẢN PHẨM </caption>
			<tr>
				<td>Mã sản phẩm:</td>
				<td><input type="text" name="masp" required></td>
			</tr>
			<tr>
				<td>Tên sản phẩm:</td>
				<td><input type="text" name="tensp" required></td>
			</tr>
			<tr>
				<td>Đường dẫn link ảnh:</td>
				<td><input type="text" name="hinh" required></td>
			</tr>
			<tr>
				<td>Mã thể loại:</td>
				<td><input type="text" name="matl" required></td>
			</tr>
			<tr>
				<td>Mã nhà cung cấp:</td>
				<td><input type="text" name="mancc" required></td>
			</tr>
			<tr>
				<td>Nội dung:</td>
				<td><input type="text" name="noidung" required></td>
			</tr>
			<tr>
				<td>Số lượng:</td>
				<td><input type="text" name="soluong" required></td>
			</tr>
            <tr>
				<td>Đơn giá:</td>
				<td><input type="text" name="gia" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button class="c2" type="submit" name="btnThemSP">Thêm sản phẩm</button>
				</td>
			</tr>
		</table>
		</form>
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>