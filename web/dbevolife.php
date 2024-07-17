<?php
    include 'ketnoi.php' ;
    $conn=Moketnoi();
    if($conn->connect_error)
    {
        echo "không kết nối được MySQL";
    }
   
    $sql="CREATE DATABASE IF NOT EXISTS EVOLIFESHOPDB";
    if(!mysqli_query($conn,$sql))
    {
            echo "Không tạo được database".mysqli_error($conn);
    }
    mysqli_select_db($conn,"EVOLIFESHOPDB");

    $LOAI = "CREATE TABLE IF NOT EXISTS LOAI (
        MATL varchar(20) primary key,
        TENTL nvarchar(200) not null)";
    $results = mysqli_query($conn,$LOAI)or die (mysqli_error($conn));

    $NHACUNGCAP = "CREATE TABLE IF NOT EXISTS NHACUNGCAP (
        MANCC nvarchar(20) primary key,
        TENNCC nvarchar(200) not null)";
    $results = mysqli_query($conn,$NHACUNGCAP)or die (mysqli_error($conn));

    $SANPHAM = "CREATE TABLE IF NOT EXISTS SANPHAM (
        MASP varchar(20) primary key,
        TENSP nvarchar(200) not null,
        HINH varchar(200) not null,
        MATL varchar(20) not null,
        MANCC nvarchar(20) not null,
        NOIDUNG varchar(1000) default 'Chưa cập nhật',
        SOLUONG int default 10,
        GIA int default 10000)";
    $results = mysqli_query($conn,$SANPHAM)or die (mysqli_error($conn));
    
    $NGUOIDUNG = "CREATE TABLE IF NOT EXISTS NGUOIDUNG (
        TENDANGNHAP varchar(200) NOT NULL,
        MATKHAU varchar(200) NOT NULL,
        HOTEN nvarchar(200) NOT NULL,
        DIACHI nvarchar(200) default 'Chưa cập nhật',
        SODT int default 0,
        EMAIL varchar(20) default 'Chưa cập nhật',
        PHANLOAI varchar(10) default 'user',
        PRIMARY KEY (TENDANGNHAP,SODT))";
    $results = mysqli_query($conn,$NGUOIDUNG)or die (mysqli_error($conn));

    $DataLOAI="INSERT INTO LOAI (MATL,TENTL)". 
                "VALUES ('GG','GOOGLE'),".
                "('ST','STEAM'),".
                "('MCR','MICROSOFT')";
    $results = mysqli_query($conn,$DataLOAI) or die (mysqli_error($conn));
    
    $DataNHACUNGCAP="INSERT INTO NHACUNGCAP (MANCC,TENNCC)". 
                "VALUES ('NCC01','Google Inc'),".
                "('NCC02','Valve Software'),".
                "('NCC03','Microsoft Company')";
    $results = mysqli_query($conn,$DataNHACUNGCAP) or die (mysqli_error($conn));

    $DataSANPHAM="INSERT INTO SANPHAM (MASP, TENSP, HINH, GIA, MATL, MANCC)". 
    "VALUES ('GG01','Google Play Gift Card 5 USD (US)','images/ggplaygift.png','130000 VNĐ','GG','NCC01'),".
    "('GG02','Google Play Gift Card 10 USD (US)','images/ggplaygift.png','260000 VNĐ','GG','NCC01'),".
    "('GG03','Google Play Gift Card 20 USD (US)','images/ggplaygift.png','535000 VNĐ','GG','NCC01'),".
    "('GG04','Google Play Gift Card 100 USD (US)','images/ggplaygift.png','2270000 VNĐ','GG','NCC01'),".

    "('ST01','Steam Wallet Code 40 HKD (~125.960 VNĐ)','images/STEAM40hkd.png','130000 VNĐ','ST','NCC02'),".
    "('ST02','Steam Wallet Code 80 HKD (~251.920 VNĐ)','images/STEAM80HKD.png','260000 VNĐ','ST','NCC02'),".
    "('ST03','Steam Wallet Code 160 HKD (~503.840 VNĐ)','images/steam160hkd.png','510000 VNĐ','ST','NCC02'),".
    "('ST04','Steam Wallet Code 200 HKD (~629.800 VNĐ)','images/STEAM200HKD.png','640000 VNĐ','ST','NCC02'),".

    "('MC01','Key Activation Windows 10 Professional','images/keywin10.jpg','260000 VNĐ','MCR','NCC03'),".
    "('MC02','Key Activation Windows 11 Professional','images/keywin11.jpg','270000 VNĐ','MCR','NCC03'),".
    "('MC03','Gói nâng cấp Office 365 1 năm (1TB)','images/office365.jpg','249000 VNĐ','MCR','NCC03'),".
    "('MC04','Microsoft Office 2019 Home & Business cho dòng máy MAC','images/officemac.jpg','490000 VNĐ','MCR','NCC03')";
    $results = mysqli_query($conn,$DataSANPHAM) or die (mysqli_error($conn));

    DongKetNoi($conn);
?>