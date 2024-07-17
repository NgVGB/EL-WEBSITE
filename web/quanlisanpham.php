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
    <article id="bookinfo"> 
    <form action="" method="post">
		<table border bordercolor="#000000" class="book" align="center">
        <?php
            echo"<caption style='font-size: 30px; padding-top: 10px; padding-bottom: 10px;'> THÔNG TIN SẢN PHẨM </caption>";
            echo "<td>Mã SP</td> 
                  <td>Tên SP</td> 
                  <td>Link Hình</td> 
                  <td>Mã TL</td>
                  <td>Mã NCC</td> 
                  <td>Nội dung</td> 
                  <td>Số Lượng</td> 
                  <td>Đơn giá</td>
                  <th align='center'>Chọn xóa/sửa</td> </tr>";
            $truyvan="SELECT * FROM SANPHAM";
            $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
            $tongdong = mysqli_num_rows($ketqua);
            $ten=array();
            if(isset($_POST['btnThemSP1'])) {
                header('Location: themsanpham.php');
            }

            for($i=0;$i<$tongdong;$i++)
            {
                $dong=mysqli_fetch_array($ketqua);
                echo "<tr> <td align='center'>".$dong['MASP']."</td> 
                      <td>".$dong['TENSP']."</td> <td>".$dong['HINH']."</td> <td>".$dong['MATL']."</td> 
                      <td>".$dong['MANCC']."</td><td>".$dong['NOIDUNG']."</td> <td>".$dong['SOLUONG']."</td>
                      <td>".$dong['GIA']."</td>  
                      <td > <input type= 'checkbox' name= 'chkChon[".$i."]'> </td> </tr>" ;
                if(isset($_POST['chkChon'][$i]))
                {
                    array_push($ten,$dong['MASP']);
                }
            }
            echo "<tr>
                  <td colspan='9' id='c9'> <button class='c2' name='btnThemSP1'> Thêm sản phẩm </button>
                  </tr>";  
        ?>
		</table>
		</form> 
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>