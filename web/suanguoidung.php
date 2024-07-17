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
    <form action="suanguoidung.php" method="post">
		<table border bordercolor="#000000" class="book" align="center">
        <?php
            error_reporting(0);
            if($_SESSION['kt']!=0)
            {
                echo "<p class='c6'> Đã sửa thành công thông tin người dùng </p>";
            }
            $_SESSION['kt']=0;
            echo"<caption> THÔNG TIN NGƯỜI DÙNG </caption>";
            echo "<tr> <th> STT </th> <th> Tên đăng nhập </th> <th> Mật khẩu </th> <th>Họ tên người dùng </th> 
                       <th>Địa chỉ </th> <th>Số điện thoại </th> <th>Email</th> <th>Phân loại</th> </tr>";
            $n=sizeof($_SESSION['tensua']);
            for($i=0;$i<$n;$i++)
            {
                $truyvan="SELECT * FROM NGUOIDUNG WHERE TENDANGNHAP='".$_SESSION['tensua'][$i]."'";
                $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                $dong=mysqli_fetch_array($ketqua);
                echo "<tr> <td align='center'>".($i+1)." </td> <td > ".$dong['TENDANGNHAP']."  </td> 
                      <td> <input type='text' name= 'txtMK[".$i."]' value=".$dong['MATKHAU']." > </td> 
                      <td> <input type='text' name= 'txtHT[".$i."]' value=".$dong['HOTEN']." > </td> 
                      <td> <input type='text' name= 'txtDC[".$i."]' value=".$dong['DIACHI']." > </td> 
                      <td> <input type='text' name= 'txtDC[".$i."]' value=".$dong['SODT']." ></td>
                      <td> <input type='text' name= 'txtM[".$i."]' value=".$dong['EMAIL']." > </td> 
                      <td> <select name='cboLoai[".$i."]'> <option value='user'> user </option>
                                                    <option value='admin'> admin </option>
                           </select> </td>
                      </tr>" ;
            }
            echo "<tr > <td colspan='8' id='c9'><input class='c2' type= 'submit' name= 'sbtDongY' value= 'Đồng ý' >
            <button class='c2' name='btnThoat'> Quay lại Quản lý người dùng </button> </td> </tr>";
            
            if(isset($_POST['sbtDongY']))
            {
                for($i=0;$i<$n;$i++)
                {
                    $truyvan="UPDATE NGUOIDUNG 
                              SET MATKHAU='".$_POST['txtMK'][$i]."', HOTEN='".$_POST['txtHT'][$i]."', 
                                  DIACHI='".$_POST['txtDC'][$i]."', EMAIL='".$_POST['txtM'][$i]."', 
                                  PHANLOAI ='".$_POST['cboLoai'][$i]."'
                              WHERE TENDANGNHAP='".$_SESSION['tensua'][$i]."'";
                    $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                }
                $kq= mysqli_affected_rows($conn);
                if($kq!=0)
                {
                    $_SESSION['kt']=1;
                }
                header('Location: quanliuser.php');
            }
            if(isset($_POST['btnThoat']))
                header('Location: quanliuser.php');
        ?>
		</table>
		</form> 
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>