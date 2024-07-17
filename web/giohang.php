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
	<table id="" align="center">
    <?php
                error_reporting(0);
                $n=sizeof($_SESSION['DSMaMua']);
                if($n==0)
                {
                    echo "<p class='c6' align='center'> Bạn chưa chọn sản phẩm để mua </p>";
                }
                else
                {
                    echo"<caption class='caption-noidung'> THÔNG TIN GIỎ HÀNG </caption>";
                    echo "<tr> <th class='td-giohang'> STT </th> <th class='td-giohang' colspan='2' align='center'> Thông tin sản phẩm mua </th> <th class='td-giohang'> Giá tiền </th> <th class='td-giohang' colspan='2'align='center'>Số lượng </th> <th class='td-giohang'>Thành tiền </th> </tr>";
                    $TongTien=0;
                    for($i=0;$i<$n;$i++)
                    {
                    $truyvan="SELECT * FROM SANPHAM AS S, NHACUNGCAP AS N WHERE S.MASP='".$_SESSION['DSMaMua'][$i]."' AND 
                    S.MANCC=N.MANCC";
                    $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
                    $dong=mysqli_fetch_array($ketqua);
                    if(isset($_POST['txtSL'][$i]))
                    {
                        $_SESSION['DSSL'][$i]=$_POST['txtSL'][$i];
                    }    
                    $Tien=$_SESSION['DSSL'][$i] * $dong['GIA'];
                    $TongTien+=$Tien;                             
                    echo "<tr> <th class='td-giohang' align='center'>".($i+1)." </td> <th class='td-giohang' > <img src='".$dong['HINH']."'></th> 
                      <th class='td-giohang'>".$dong['TENSP']." <br> <br>
                      Nhà cung cấp:".$dong['TENNCC']." </th>  
                      <th class='td-giohang'>".number_format($dong['GIA'])." đồng </th> 
                      <th class='td-giohang'> <input  type='number' min='1'  oninput='validity.valid||(value='');' name='txtSL[".$i."]' value=".$_SESSION['DSSL'][$i]." > </th>
                       <th class='td-giohang'> <button class='c2' name='btnXoa[".$i."]'> Xóa Sản Phẩm </button> </th>
                      <th class='td-giohang'> ".number_format($Tien)." đồng </th>
                      </tr>";        
                    if(isset($_POST['btnXoa'][$i]))
                    {
                          for($j=$i;$j<$n-1;$j++)
                          {
                            $_SESSION['DSMaMua'][$j]=$_SESSION['DSMaMua'][$j+1];
                            $_SESSION['DSSL'][$j]=$_SESSION['DSSL'][$j+1];
                          }
                          array_pop($_SESSION['DSMaMua']);
                          array_pop($_SESSION['DSSL']);
                          header('Location: gioHang.php');
                    }
                    }
                echo "<tr> <th class='td-giohang' colspan='6' align='center'> Tổng tiền </td> <td class='td-giohang'>".number_format($TongTien)." đồng </th> </tr>"; 
                echo "<tr > <th class='' colspan='3' id='c9'> <button class='c2' name='btnThanhToan'> <a href='chitietgiohang.php'> Thanh toán </a> </button> </th>
                <th class='' colspan='2' id='c9'> <input type='submit' class='c2' name='btnCapNhat' value='Cập nhật giỏ hàng'> </th> </tr>";
                }
            ?>
    </table>
	</form>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>