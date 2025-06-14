<?php
//session start
session_start();

$con = mysqli_connect("localhost", "root","12345678","bukudb");

//kondisi jika tombol login di tekan
if (isset($_POST['submit'])) {
    $usr = $_POST['uname'];
    $pass = md5($_POST['pw']);

    $query = mysqli_query($con,"SELECT * FROM admin WHERE username='$usr' and password='$pass'");
    $data = mysqli_fetch_array($query);
    $cek = mysqli_num_rows($query);

    if ($cek==1) {
    //session 
    $_SESSION['uname'] = @$usr;
    $_SESSION['password'] = @$pass;
    header("location:index.php?home");
	}
    else {
    header("location:index.php");
    }
}