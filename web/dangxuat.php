<?php
    session_start();
    if (isset($_SESSION['tendangnhap']))
    {
        unset($_SESSION['tendangnhap']);
        unset($_SESSION['loainguoidung']);
    }
    header('Location: trangchu.php');
?>