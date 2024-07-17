<?php
	include 'ketnoi.php';
	$conn=Moketnoi();
	mysqli_select_db($conn,"EVOLIFESHOPDB");

	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = ($_POST['matkhau']);
	$hoten = $_POST['hoten'];
	$diachi = $_POST['diachi'];
	$sodt = $_POST['sodt'];
	$email = $_POST['email'];
	$phanloai = $_POST['phanloai'];

	$truyvan = "INSERT INTO NGUOIDUNG (TENDANGNHAP, MATKHAU, HOTEN, DIACHI, SODT, EMAIL, PHANLOAI) VALUES ('$tendangnhap', '$matkhau', '$hoten', '$diachi', '$sodt', '$email', '$phanloai')";
	$ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));

	header('Location: quanliuser.php');
?>