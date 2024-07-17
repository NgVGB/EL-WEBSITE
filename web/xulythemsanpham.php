<?php
	include 'ketnoi.php';
	$conn=Moketnoi();
	mysqli_select_db($conn,"EVOLIFESHOPDB");

	$masp = $_POST['masp'];
	$tensp = ($_POST['tensp']);
	$hinh = $_POST['hinh'];
	$matl = $_POST['matl'];
	$mancc = $_POST['mancc'];
	$noidung = $_POST['noidung'];
	$soluong = $_POST['soluong'];
    $gia = $_POST['gia'];

	$truyvan = "INSERT INTO SANPHAM (MASP, TENSP, HINH, MATL, MANCC, NOIDUNG, SOLUONG, GIA) VALUES ('$masp', '$tensp', '$hinh', '$matl', '$mancc', '$noidung', '$soluong', '$gia')";
	$ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));

	header('Location: quanlisanpham.php');
?>