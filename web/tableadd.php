<?php
    include 'ketnoi.php' ;
    $conn=Moketnoi();
    if($conn->connect_error)
    {
        echo "không kết nối được MySQL";
    }

    mysqli_select_db($conn,"EVOLIFESHOPDB");
    $DataSANPHAM="INSERT INTO SANPHAM (MASP, TENSP, HINH, GIA, MATL, MANCC)". 
    "VALUES ('GG01','Google Play Gift Card 5 USD (US)','images/ggplaygift.png','130000 VNĐ','GG','NCC01')";
    $results = mysqli_query($conn,$DataSANPHAM) or die (mysqli_error($conn));

    DongKetNoi($conn);
?>