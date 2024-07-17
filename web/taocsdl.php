<?php
    include 'ketnoi.php';
    $conn=Moketnoi();
    if($conn->connect_error) {
        echo "không kết nối được MySQl";
    }
    $sql="CREATE DATABASE IF NOT EXISTS EVOLIFESHOPDB";
    if(!mysqli_query($conn,$sql)){
        echo "Không tạo được database Nhà sách BKC".mysqli_error($conn);
    }
    mysqli_select_db($conn,"EVOLIFESHOPDB");
    $NGUOIDUNG="CREATE TABLE IF NOT EXISTS NGUOIDUNG (
        TENDANGNHAP varchar(200) NOT NULL,
        MATKHAU varchar(200) NOT NULL,
        HOTEN nvarchar(200) NOT NULL,
        DIACHI nvarchar(200) default 'Chưa cập nhật',
        SODT int default 0,
        EMAIL varchar(20) default 'Chưa cập nhật',
        PHANLOAI varchar(10) default 'user',
        PRIMARY KEY (TENDANGNHAP,SODT))";
    $result = mysqli_query($conn,$NGUOIDUNG) or die (mysqli_error($conn));
    $DATANGUOIDUNG="INSERT INTO NGUOIDUNG (TENDANGNHAP,MATKHAU,HOTEN,DIACHI,SODT ,EMAIL,PHANLOAI)"."VALUES ('chuoichuoichuoi','123','Nguyễn Văn Chuối','123 abc','1234567890','abc@abc','admin')";
    $results= mysqli_query($conn,$DATANGUOIDUNG) or die (mysqli_error($conn));
    DongKetNoi($conn);
?>