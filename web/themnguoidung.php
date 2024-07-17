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
    <form action="xulythemnguoidung.php" method="post">
		<table border bordercolor="#000000" class="book" align="center">
			<caption style="font-size: 30px; padding-top: 10px; padding-bottom: 10px;"> THÊM NGƯỜI DÙNG </caption>
			<tr>
				<td>Tên đăng nhập:</td>
				<td><input type="text" name="tendangnhap" required></td>
			</tr>
			<tr>
				<td>Mật khẩu:</td>
				<td><input type="text" name="matkhau" required></td>
			</tr>
			<tr>
				<td>Họ tên:</td>
				<td><input type="text" name="hoten" required></td>
			</tr>
			<tr>
				<td>Địa chỉ:</td>
				<td><input type="text" name="diachi" required></td>
			</tr>
			<tr>
				<td>Số điện thoại:</td>
				<td><input type="text" name="sodt" required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td>Phân loại:</td>
				<td>
					<select name="phanloai">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button class="c2" type="submit" name="btnThemNguoiDung">Thêm người dùng</button>
				</td>
			</tr>
		</table>
		</form>
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>