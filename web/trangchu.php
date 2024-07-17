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
                        <li><a href="#TinCN"><i class="material-icons">book</i> Tin Công Nghệ</a></li>
                    </ul>
                </li>
                <?php include 'phanquyen.php' ?>
            </ul>
        </nav>

        <aside class="wow fadeInLeft" id="CanhTrai">
            <h2>DANH MỤC</h2>
            <ul>
                <li><a style="font-size: 16px;" href="xemthemsp.php?loai=GOOGLE"><i class="fa-solid fa-play fa-1x"></i>  Google</a></li>
                <li><a style="font-size: 16px;" href="xemthemsp.php?loai=STEAM"><i class="fa-brands fa-steam fa-1x"></i> Steam  </a></li>
                <li><a style="font-size: 16px;" href="xemthemsp.php?loai=MICROSOFT"><i class="fa-brands fa-windows fa-1x"></i> Microsoft  </a></li>
            </ul>
            <h2>HƯỚNG DẪN</h2>
            <ul>
                <li><a style="font-size: 16px;" href="#"><i class="fa-solid fa-credit-card fa-1x"></i> Mua hàng </a></li>
                <li><a style="font-size: 16px;" href="#"><i class="fa-solid fa-cart-shopping fa-1x"></i> Ưu đãi  </a></li>
                <li><a style="font-size: 16px;" href="#"> <i class="fa-solid fa-location-dot fa-1x"></i>&nbsp;Giao dịch  </a></li>
            </ul>
        </aside>

	<article id="sanpham">
        <h2 class="wow fadeIn"><span class="badge"><i class="material-icons">sell</i> FLASH SALE GIẢM GIÁ MỌI SẢN PHẨM CỰC MẠNH!! &nbsp;</span></h2>
        <table>
            <tr>
                <img class="wow bounceInLeft" width="500px" id="imgcenter" src="images/bannerHOME.png">
                &nbsp; &nbsp;
                <img class="wow bounceInRight" width="520px" id="imgcenter" src="images/bannerGOOGLE.png">
            </tr>
        </table>
        <hr>
        &nbsp;
        <table class="wow fadeIn">
        <?php
            include 'ketnoi.php';
            $conn=Moketnoi();
            mysqli_select_db($conn, 'EvoLifeShopDB');
            $truyvan1="SELECT * FROM LOAI ";
            $ketqua1 = mysqli_query($conn, $truyvan1) or die(mysqli_error($conn));
            $tongdong1 = mysqli_num_rows($ketqua1);
            for($i=1;$i<=$tongdong1;$i++)
            {
                $dong1=mysqli_fetch_array($ketqua1);
                $truyvan="SELECT * FROM SANPHAM AS S, LOAI AS L WHERE S.MATL=L.MATL AND TENTL='".$dong1['TENTL']."'";
                $ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
                echo "<tr class='wow bounceInUp'>";
                for ($j=1;$j<=4;$j++)
                {
                    $dong=mysqli_fetch_array($ketqua);
                    echo "<td> <img src='".$dong[ 'HINH']."'> <br> <br> ".$dong['TENSP']."
                    <br> <p id='redcolor'>Giá: ".number_format($dong['GIA'])." VNĐ<br>

                    <br> <button class='c2' type='button' name='btnXem'><a href='xemnoidung.php?masp=".$dong['MASP']."'><i class='fa-solid fa-cart-shopping'></i> Mua Ngay </a> </button> </td>";
                }
                echo "<tr><th colspan='4'><a href='xemthemsp.php?loai=".$dong1['TENTL']."' class='c3'>Xem thêm danh sách ".$dong1['TENTL']."</a></th></tr>";
                echo "</tr>";
            }
        ?>
        </table>
        <h2 class="wow fadeIn">Tin công nghệ</h2>
        <section id="TinCN">
        <fieldset class="wow slideInLeft">
            <img style="width: 30%" class="textimage" id="imgcenter" src="https://i1-sohoa.vnecdn.net/2024/02/26/Airpods-Pro-vnexpress-REL08775-8725-2973-1708933733.png?w=680&h=0&q=100&dpr=1&fit=crop&s=lQSBDCeq8DhVkY3xwphClw">
            <h2><a class="thoigian">05/01/2024</a> Tai nghe AirPods có thể có camera</h2>
            <p style="font-size: 20px;">Apple được cho là đang xem xét các ý tưởng như đưa camera lên AirPods, tạo kính thông minh có thiết kế giống kính mát, hay phát triển smart ring.
Theo Bloomberg, Apple đang thử nghiệm trang bị camera độ phân giải thấp cho tai nghe. Dự án có tên mã B798, nhưng nguồn tin không mô tả chi tiết ngoài việc nói thiết bị "có thể kết hợp cảnh quay từ camera......</p>
            <a class="btnbuy" href="xem1.php">Xem Thêm</a>
        </fieldset>
        <br>
        <fieldset class="wow slideInRight">
            <img style="width: 30%" class="textimage" id="imgcenter" src="https://i1-sohoa.vnecdn.net/2024/02/26/diothers-6674-1708937528.png?w=680&h=0&q=100&dpr=1&fit=crop&s=EqlL78-ShDZkESi8LGnYag">
            <h2><a class="thoigian">25/02/2024</a> Hai thiết kế trước khi chọn Dynamic Island của Apple</h2>
            <p style="font-size: 20px;">Apple được cho là đã tính đến hai phương án khác để thay phần "tai thỏ" trên iPhone 14 trước khi áp dụng Dynamic Island.

Theo MacRumors, trước khi chọn Dynamic Island để thay thế cho phần khuyết màn hình, còn gọi là "tai thỏ" trên iPhone 14, Apple đã xem xét một số vị trí để hiển thị thông tin cho iPhone....</p>
            <a class="btnbuy" href="xem2.php">Xem Thêm</a>
        </fieldset>
        <br>
    </section>
    </article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>