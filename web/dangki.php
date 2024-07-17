<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="UTF-8">
    <title>Đăng Kí - EVOLIFE</title>
    <link rel="stylesheet" type="text/css" href="DK.css">
  </head>
  <body>
    <?php
            include 'ketnoi.php';
            $conn=Moketnoi();
            $tendn="";
            $mk="";
            $mkre="";
            $sdt="";
            $ten="";
            $diacchi="";
            $email="";
                
            if ($conn->connect_error){
                echo "<p class='titlewarn'>Không kết nối được MySQL </p>" ;
            }
            mysqli_select_db($conn,"EVOLIFESHOPDB");
            if(isset($_POST['btnDangky'])){
                $tendn=$_POST['User'];
                $mk=$_POST['Password'];
                $mkre=$_POST['Password2'];
                $sdt=$_POST['txtPhoneNumber'];
                $ten=$_POST['txtName'];
                $diacchi=$_POST['txtDiachi'];
                $email=$_POST['txtEmail'];
                $kt=1;
                if ($mk!=$mkre) {
                    echo "<p class='titlewarn'>Bạn nhập lại mật khẩu chưa đúng</p>";
                    $kt=0;
                }
                if (empty($tendn)||empty($mk)||empty($mkre)||empty($sdt)||empty($ten)) {
                    "<p class='titlewarn'>Nhập thông tin bắt buộc *</p>";
                    $kt=0;
                }
                if(mysqli_num_rows(mysqli_query($conn,"SELECT TENDANGNHAP FROM NGUOIDUNG WHERE TENDANGNHAP='$tendn'"))>0 ) {
                    echo "<p class='titlewarn'>Đã có tên đăng nhập *</p>";
                    $kt=0;
                }
                if(mysqli_num_rows(mysqli_query($conn,"SELECT SODT FROM NGUOIDUNG WHERE SODT='$sdt'"))>0 ) {
                    echo "<p class='titlewarn'>Số điện thoại đã có</p>";
                    $kt=0;
                }
                if ($kt==1) {
                    $nguoidung="INSERT INTO NGUOIDUNG(TENDANGNHAP,MATKHAU,HOTEN,DIACHI,SODT ,EMAIL)
                    VALUES (('$tendn'),('$mk'),('$ten'),('$diacchi'),('$sdt'),('$email'))";
                    $resaults= mysqli_query ($conn,$nguoidung) or die (mysqli_error($conn));
                    echo "<p class='titlesuccess'>Bạn đăng ký thành công</p>";
                }
            }
        ?>
    <form method="post" from="BTap4">
	  <a class="imgHome" href="index.html"><img style="width: 40%" src="logo.png"></a>
  <br>
  <br>
      <h2 class="titleDN">
		ĐĂNG KÍ
        <br><p>Vui lòng nhập thông tin đăng kí</p>
	  </h2>
      <fieldset><legend>Thông tin cá nhân</legend>
        <p class="title2">Họ tên:</p>
        <input type="text" id="userame" name="txtName" placeholder="Nhập họ tên của bạn">
        <p class="title2">Số ĐT:</p>
        <input class="btn42" type="number" min="0" id="sdt" name="txtPhoneNumber" placeholder="Nhập số điện thoại">
        <p class="title2">Địa chỉ:</p>
        <input type="text" id="address" name="txtDiachi" placeholder="Nhập địa chỉ">
      </fieldset>

      <fieldset><legend>Thông tin tài khoản</legend>
        <p class="title2">Tên đăng nhập:</p>
        <input type="text" id="user" name="User" placeholder="Nhập tên tài khoản">
        <p class="title2">Gmail:</p>
        <input type="text" id="gmail" name="txtEmail" placeholder="Nhập gmail">
        <p class="title2">Mật khẩu:</p>
        <input type="password" id="pass" name="Password" placeholder="Nhập mật khẩu">
        <p class="title2">Nhập lại mật khẩu:</p>
        <input type="password" id="reinputpass" name="Password2" placeholder="Nhập lại mật khẩu">
      </fieldset>
      <br>
      <button type="submit" name="btnDangky" value="DN">Đăng Kí</button>
      <button type="submit" value="Thoat"><a style="text-decoration: none;color: white;" href="trangchu.php">Thoát</a></button>
	    <button type="reset" name="btnReset" value="RS">Nhập Lại</button>
    </form>
  </body>
</html>