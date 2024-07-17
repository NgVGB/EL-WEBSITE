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
    <form action="quanliuser.php" method="post">
		<table border bordercolor="#000000" class="book" align="center">
        <?php
            error_reporting(0);
            echo"<caption style='font-size: 30px; padding-top: 10px; padding-bottom: 10px;'> THÔNG TIN NGƯỜI DÙNG </caption>";
            echo "<tr> <td>STT </td> <td> Tên đăng nhập </td> <td> Mật khẩu </td> <td>Họ tên người dùng </td> 
                       <td>Địa chỉ </td> <td>Số điện thoại </td> <td>Email</td> <td>Phân loại</td>
                       <th align='center'>Chọn xóa/sửa</td> </tr>";
            $truyvan="SELECT * FROM NGUOIDUNG";
            $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
            $tongdong = mysqli_num_rows($ketqua);
            $ten=array();
            for($i=0;$i<$tongdong;$i++)
            {
                $dong=mysqli_fetch_array($ketqua);
                echo "<tr> <td align='center'>".($i+1)." </td> <td >".$dong['TENDANGNHAP']."</td> 
                      <td>".$dong['MATKHAU']."</td> <td>".$dong['HOTEN']."</td> <td>".$dong['DIACHI']."</td> 
                      <td>".$dong['SODT']."</td><td>".$dong['EMAIL']."</td> <td>".$dong['PHANLOAI']."</td> 
                      <td > <input type= 'checkbox' name= 'chkChon[".$i."]'> </td> </tr>" ;
                if(isset($_POST['chkChon'][$i]))
                {
                    array_push($ten,$dong['TENDANGNHAP']);
                }
            }
            echo "<tr>
                  <td colspan='9' id='c9'> <button class='c2' name='btnThem'> Thêm người dùng </button>
                  <button class='c2' name='btnXoa'> Xóa người dùng</button>
                  <button class='c2' name='btnSua'> Sửa thông tin </button> </td>
                  </tr>";  
            if(isset($_POST['btnThem']))
                header('Location: themnguoidung.php');
            if(isset($_POST['btnXoa']))
            {
                $sodongxoa=sizeof($ten);
                if($sodongxoa!=0)
                {
                    for($i=0;$i<$sodongxoa;$i++)
                    {
                        $truyvanxoa="DELETE FROM NGUOIDUNG WHERE TENDANGNHAP='".$ten[$i]."' ";
                        $ketquaxoa = mysqli_query($conn,$truyvanxoa) or die (mysqli_error($conn));
                        header('Location: quanliuser.php');
                    }
                    
                }
                if(!isset($_POST['chkChon']))
                {
                    echo "<p class='c6'>Bạn chưa chọn người dùng để xóa </p>";
                }
            }
            if(isset($_POST['btnSua']))
            {
                if(!isset($_POST['chkChon']))
                {
                    echo "<p class='c6'>Bạn chưa chọn người dùng để sửa </p>";
                }
                else
                {
                    $_SESSION['tensua']=array();
                    $_SESSION['tensua']=$ten;
                    header('Location: suanguoidung.php');
                }
            }   
        ?>
		</table>
		</form> 
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>