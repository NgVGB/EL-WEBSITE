<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="UTF-8">
    <title>Đăng Nhập - EVOLIFE</title>
    <link rel="stylesheet" type="text/css" href="DN.css">
    <link rel="stylesheet" type="text/css" href="animate.css">
  </head>
  <body class="wow fadeIn">
    <?php
            include "ketnoi.php";
            $conn=Moketnoi();
            session_start();
            if ($conn->connect_error){
                echo "<p class='dangky'>Không kết nối được MySQL </p>" ;
            }
            mysqli_select_db($conn,"EVOLIFESHOPDB");
            
            $tendn="";
            $mk="";
            if (isset($_POST['btndangnhap'])) {
                $tendn=$_POST['txtdangnhap'];
                $mk=$_POST['txtmatkhau'];
                $kt=1;
                if (mysqli_num_rows(mysqli_query($conn,"SELECT TENDANGNHAP FROM NGUOIDUNG WHERE TENDANGNHAP='$tendn'"))==0) {
                    echo "<p class='wow fadeInLeft titlewarn'>Tên đăng nhập không tồn tại</p>";
                    $kt=0;                    
                }
                if(mysqli_num_rows(mysqli_query($conn,"SELECT MATKHAU FROM NGUOIDUNG WHERE MATKHAU='$mk'"))==0) {
                    echo "<p class='wow fadeInLeft titlewarn'>Nhập sai mật khẩu hoạc người dùng</p>";
                    $kt=0;
                }
                $row = mysqli_fetch_array(mysqli_query($conn,"SELECT HOTEN,MATKHAU,PHANLOAI FROM NGUOIDUNG WHERE TENDANGNHAP='$tendn'"));
                if ($kt==1)
                {
                   $_SESSION['tendangnhap']=$row['HOTEN'];
                   $_SESSION['loainguoidung']=$row['PHANLOAI'];
                   header('Location:trangchu.php');
                }
        
            }
            
        ?>
    <form method="post" from="BTap4">
	<a class="imgHome" href="index.html"><img style="width: 40%" src="logo.png"></a>
  <br>
  <br>
      <h2 class="titleDN">
		ĐĂNG NHẬP
        <br><p>Vui lòng đăng nhập tài khoản</p>
	  </h2>
      <p class="title2">Tên Đăng Nhập:</p>
      <input type="text" id="userame" name="txtdangnhap" placeholder="Nhập tên tài khoản">
      <p class="title2">Mật Khẩu:</p>
      <input type="password" id="password" name="txtmatkhau" placeholder="Nhập mật khẩu">

      <button type="submit" name="btndangnhap" value="DN">Đăng Nhập</button>
      <button type="submit" value="Thoat"><a style="text-decoration: none;color: white;" href="trangchu.php">Thoát</a></button>
	    <button type="reset" value="RS">Nhập Lại</button>
    </form>
  </body>
</html>

<script src="wowanim/wow.min.js"></script>
        <script>
              new WOW().init();
        </script>