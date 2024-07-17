<?php
function Moketnoi() {
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $conn=mysqli_connect($dbhost,$dbuser,$dbpass);
    return $conn;
}
function DongKetNoi($conn){
    $conn->close();
}
?>