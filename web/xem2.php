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
        <h2><a class="thoigian">25/02/2024</a> Hai thiết kế trước khi chọn Dynamic Island của Apple</h2>
        <p style="font-size: 20px;">
        Apple được cho là đã tính đến hai phương án khác để thay phần "tai thỏ" trên iPhone 14 trước khi áp dụng Dynamic Island.

Theo MacRumors, trước khi chọn Dynamic Island để thay thế cho phần khuyết màn hình, còn gọi là "tai thỏ" trên iPhone 14, Apple đã xem xét một số vị trí để hiển thị thông tin cho iPhone.

Phương án đầu tiên là giữ phần tai thỏ và tạo thêm khu vực ở cạnh phải chứa các biểu tượng như thời gian, sóng di động, wifi, độ sáng, âm lượng và pin. Phần này sẽ ẩn đi nếu không dùng tới. Phương án thứ hai là camera trước và cảm biến sẽ có dạng đục lỗ, còn thông tin hiển thị như thời gian, trạng thái pin, wifi, mạng di động... sẽ tràn ra cả hai mép màn hình.

Tuy nhiên, Apple sau đó đã quyết định rằng phần hiển thị thông tin sẽ có thể thay đổi kích thước linh hoạt và giải pháp Dynamic Island được áp dụng.
        </p>
        <img style="width: 100%" class="textimage" id="imgcenter" src="https://i1-sohoa.vnecdn.net/2024/02/26/diothers-6674-1708937528.png?w=680&h=0&q=100&dpr=1&fit=crop&s=EqlL78-ShDZkESi8LGnYag">
        <br>&nbsp;
        <p style="font-size: 20px;">
        Dynamic Island xuất hiện trên iPhone 14 Pro và 14 Pro Max năm 2022, trước khi có mặt trên toàn bộ dòng iPhone 15 năm ngoái. Ở chế độ bình thường, phần này có dạng viên thuốc chứa camera trước và cảm biến giống smartphone Android. Tuy nhiên, Apple đã khéo léo biến khu vực này thành một màn hình phụ, có thể thay đổi kích cỡ và hiển thị nhiều loại thông báo dưới dạng bong bóng mà không gây gián đoạn.

Theo CEO Tim Cook khi đó, Dynamic Island ra đời nhằm đem đến không gian hiển thị rõ ràng, mạch lạc theo cách thú vị nhất cho người dùng. Trang công nghệ Cnet đánh giá đây là "cuộc cách mạng" khi biến phần khuyết màn hình - vốn gây khó chịu trong quá trình sử dụng - trở thành tính năng độc nhất vô nhị và hữu ích cho người dùng. Dù vậy, thời gian sau phấn khích ban đầu, chức năng này không còn được chú ý nhiều.
        </p>
        <br>
        <br>
		</table>
	</article>

    <?php include 'cuoitrang.php' ?>

</body>
</html>