<?php
//include class controller
include "controller/controller.php";

//variabel main merupakan objek baru yang dibuat dari class controller
$main = new controller();

//kondisi session login
session_start();
if (isset($_SESSION['uname']) || isset($_SESSION['password'])) {
    //kondisi untuk menampilkan halaman web yang diminta
    if(isset($_GET['ib'])){
        $main->view_insert_buku(); //kondisi untuk mengakses halaman tambah buku
    }
    elseif(isset($_GET['eb'])){
        $id = $_GET['eb'];
        $main->view_edit_buku($id); //kondisi untuk mengakses halaman edit buku
    }
    elseif(isset($_GET['db'])){
        $id = $_GET['db'];
        $main->delete_buku($id); //kondisi untuk menghapus data buku 
    }
    elseif(isset($_GET['idb'])){
        $main->index_buku(); //kondisi get index buku
    }
    // anggota routing
    elseif(isset($_GET['ia'])){
        $main->view_insert_anggota(); //tambah anggota
    }
    elseif(isset($_GET['ea'])){
        $id = $_GET['ea'];
        $main->view_edit_anggota($id); //edit anggota
    }
    elseif(isset($_GET['da'])){
        $id = $_GET['da'];
        $main->delete_anggota($id); //hapus anggota
    }
    elseif(isset($_GET['ida'])){
        $main->index_anggota(); //tampilkan anggota
    }
    // pinjam routing
    elseif(isset($_GET['ip'])){
        $main->view_insert_pinjam(); //tambah pinjam
    }
    elseif(isset($_GET['ep'])){
        $id = $_GET['ep'];
        $main->view_edit_pinjam($id); //edit pinjam
    }
    elseif(isset($_GET['dp'])){
        $id = $_GET['dp'];
        $main->delete_pinjam($id); //hapus pinjam
    }
    elseif(isset($_GET['idp'])){
        $main->index_pinjam(); //tampilkan pinjam
    }
    elseif(isset($_GET['home'])){ // halaman utama tampil menu
        $main->index();
    }
    else {
        $main->view_login(); //kondisi default halaman login
    }
} else {
    $main->view_login();
}
?>
