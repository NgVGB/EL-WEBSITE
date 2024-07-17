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
		<table class="book" align="center">
        <h2><a class="thoigian">05/01/2024</a> Tai nghe AirPods có thể có camera</h2>
        <p style="font-size: 20px;">
        Apple được cho là đang xem xét các ý tưởng như đưa camera lên AirPods, tạo kính thông minh có thiết kế giống kính mát, hay phát triển smart ring.

Theo Bloomberg, Apple đang thử nghiệm trang bị camera độ phân giải thấp cho tai nghe. Dự án có tên mã B798, nhưng nguồn tin không mô tả chi tiết ngoài việc nói thiết bị "có thể kết hợp cảnh quay từ camera và AI để giúp người dùng theo dõi các hoạt động và tối ưu hóa thói quen hàng ngày".

AirPods hiện là một trong những thiết bị đeo phổ biến nhất của Apple. Hãng đã ra mắt ba dòng AirPods gồm AirPods thường, AirPods Pro và tai nghe trùm đầu AirPods Max. Business Insider đánh giá, nếu thông tin trên là sự thật, việc tích hợp camera lên tai nghe là giải pháp khả thi giúp tối ưu hóa trải nghiệm người dùng. Tuy nhiên, chưa rõ camera sẽ gắn trên bản AirPods nào.
        </p>
        <img style="width: 100%;" class="textimage" id="imgcenter" src="https://i1-sohoa.vnecdn.net/2024/02/26/Airpods-Pro-vnexpress-REL08775-8725-2973-1708933733.png?w=680&h=0&q=100&dpr=1&fit=crop&s=lQSBDCeq8DhVkY3xwphClw">
        <br>&nbsp;
        <p style="font-size: 20px;">
        Bên cạnh đó, Apple được cho là đang nghiên cứu kính thông minh thiết kế dạng kính mát tương tự Meta Ray-Ban. Ý tưởng mới đang trong "giai đoạn thăm dò" và được được kỳ vọng là một giải pháp thay thế cho AirPods.

CEO Meta Mark Zuckerberg từng cho biết kính thông minh Ray-Ban bán chạy hơn mong đợi, một phần nhờ các tính năng AI tích hợp sẵn. Kính của Meta có thể ghi và phát trực tiếp video, tương tác với AI hay phát nhạc.

Trong khi đó, Apple đã bán kính Vision Pro với giá 3.500 USD nhưng bị đánh giá cồng kềnh và không phù hợp sử dụng nơi công cộng. Theo Business Insider, việc phát triển dạng kính mát có thể giúp người dùng có trải nghiệm tốt và linh hoạt hơn, đặc biệt là các tính năng liên quan đến thực tế tăng cường AR.

Nguồn tin cũng cho biết Apple đang tạo nhẫn thông minh (smart ring). Công ty đã được cấp một số bằng sáng chế liên quan, nhưng vẫn chưa đưa ra thị trường sản phẩm nào. Trong các hồ sơ đăng ký, nhẫn thông minh được Apple mô tả có màn hình cảm ứng, kết nối không dây, cảm biến đo các chỉ số về sức khỏe của cơ thể.

Apple chưa đưa ra bình luận.

Trước đó, trang ETNews của Hàn Quốc cho biết sau khi có thông tin Samsung sắp giới thiệu Galaxy Ring, Apple đã bắt đầu xem xét nghiêm túc kế hoạch công bố Apple Ring. Một nguồn tin giấu tên trong ngành nói quá trình thương mại hóa nhẫn Apple sẽ sớm diễn ra. Còn theo Electronic Times, hãng đang theo dõi dấu hiệu để đánh giá liệu nhẫn thông minh có trở thành lựa chọn thay thế đồng hồ thông minh hay không nhờ vào việc có thể đeo lâu hơn, nhất là cho việc theo dõi giấc ngủ.

Thống kê của Business Research Insight cho thấy thị trường nhẫn thông minh toàn cầu có thể tăng từ 20 triệu USD năm 2023 lên gần 200 triệu USD vào 2031. Apple có nhiều cách tiếp cận phân khúc thị trường này, ví dụ có thể dùng nhẫn để điều khiển thiết bị khác như smartphone, nhưng ưu tiên của hãng là theo dõi sức khỏe.
        </p>
        <br>
        <br>
		</table>
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>