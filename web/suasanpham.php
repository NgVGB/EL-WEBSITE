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
    <form action="suasanpham.php" method="post">
		<table border bordercolor="#000000" class="book" align="center">
        <?php
            error_reporting(0);
            if($_SESSION['kt']!=0)
            {
                echo "<p class='c6'> Đã sửa thành công sản phẩm </p>";
            }
            $_SESSION['kt']=0;
            echo"<caption style='font-size: 30px; padding-top: 10px; padding-bottom: 10px;'> THÔNG TIN SẢN PHẨM </caption>";
            echo "<td>Mã SP</td> 
                  <td>Tên SP</td> 
                  <td>Hình</td> 
                  <td>Mã TL</td>
                  <td>Mã NCC</td> 
                  <td>Nội dung</td> 
                  <td>Số Lượng</td> 
                  <td>Đơn giá</td>
                  </td> </tr>";
            $n=sizeof($_SESSION['tensua']);
            for($i=0;$i<$n;$i++)
            {
                $truyvan="SELECT * FROM SANPHAM WHERE MASP='".$_SESSION['tensua'][$i]."'";
                $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                $dong=mysqli_fetch_array($ketqua);
                echo "<tr> <td align='center'> <input type='text' name= 'txtMSP[".$i."]' value=".$dong['MASP']." > </td> 
                      <td> <input type='text' name= 'txtTSP[".$i."]' value=".$dong['TENSP']." > </td> 
                      <td> <input type='text' name= 'txtH[".$i."]' value=".$dong['HINH']." > </td> 
                      <td> <input type='text' name= 'txtMTL[".$i."]' value=".$dong['MATL']." > </td> 
                      <td> <input type='text' name= 'txtNCC[".$i."]' value=".$dong['MANCC']." ></td>
                      <td> <input type='text' name= 'txtND[".$i."]' value=".$dong['NOIDUNG']." > </td> 
                      <td> <input type='text' name= 'txtSL[".$i."]' value=".$dong['SOLUONG']." > </td>
                      <td> <input type='text' name= 'txtDG[".$i."]' value=".$dong['GIA']." > </td>
                      </tr>" ;
            }
            echo "<tr > <td colspan='8' id='c9'><input class='c2' type= 'submit' name= 'sbtDongY' value= 'Đồng ý' >
            <button class='c2' name='btnThoat'> Quay lại Quản lý sản phẩm </button> </td> </tr>";
            
            if(isset($_POST['sbtDongY']))
            {
                for($i=0;$i<$n;$i++)
                {
                    $truyvan="UPDATE SANPHAM
                              SET MASP='".$_POST['txtMSP'][$i]."', TENSP='".$_POST['txtTSP'][$i]."', 
                                  HINH='".$_POST['txtH'][$i]."', MATL='".$_POST['txtMTL'][$i]."', 
                                  MANCC ='".$_POST['txtNCC'][$i]."', NOIDUNG='".$_POST['txtND'][$i]."', 
                                  SOLUONG ='".$_POST['txtSL'][$i]."', GIA='".$_POST['txtDG'][$i]."', 
                              WHERE MASP='".$_SESSION['tensua'][$i]."'";
                    $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                }
                $kq= mysqli_affected_rows($conn);
                if($kq!=0)
                {
                    $_SESSION['kt']=1;
                }
                header('Location: quanlisanpham.php');
            }
            if(isset($_POST['btnThoat']))
                header('Location: quanlisanpham.php');
        ?>
		</table>
		</form> 
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>