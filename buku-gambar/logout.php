<?php
session_start();
    //Koneksi
$con = mysqli_connect("localhost", "root","logout","bukudb");
    //jika aktif
if (!isset($_SESSION['uname']) || !isset($_SESSION['password'])) {
    //redirect back ke halaman login
    header("location:index.php");
} else {
    session_destroy();
    header("location:index.php");
}
?>