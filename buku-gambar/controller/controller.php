<?php
	//include class model
	include "model/model.php";
	
	class controller{
		//variable public
		public $model;
		
		//inisialisasi awal untuk class
		function __construct() {
			$this->model = new model(); //Variable model merupakan objek baru yang dibuat dari class model
		}
		
		function view_login() {
			include "view/login.php";
		}
		
		function index() {
			include "view/home.php"; //memanggail view.php pada folder view
		}
		// awal halaman buku
		function index_buku() {
			$data = $this->model->select_all_buku(); //pada class ini (controller), akses variabel model
			//akses fungsi selectALL (kalo bingung lihat di class model ada fungsi selectAll)
			include "view/index_buku.php"; //memanggail view.php pada folder view
		}
		
		function view_insert_buku() {
			$data = $this->model->get_max_kd_buku();
			include "view/tambah_buku.php"; //Menampilkan halaman add data
		}
		
		function insert_buku() {
			$kode = $_POST['kd_buku'];
			$nama = $_POST['nm_buku'];
			$pengarang = $_POST['pg_buku'];
			$penerbit = $_POST['pn_buku'];
			$tahun = $_POST['thn_buku'];
			
			
			//upload foto
			$tipefile = $_FILES['cover']['type'];
			$lokasifile = $_FILES['cover']['tmp_name'];
			$ukuranfile = $_FILES['cover']['size'];
			$namafile = $_FILES['cover']['name'];
			$namafoto = $kode.".".end(explode(".",$namafile));
			$tempatfile = "cover_buku/$namafoto";
			
			//Memindahkan ke database
			move_uploaded_file($lokasifile, "$tempatfile");
			
			
			$insert = $this->model->insert_b($kode, $nama, $pengarang, $penerbit, $tahun, $tempatfile);
			header("location:index.php?idb=index_buku");
		}
		
		function view_edit_buku($id) {
			$data = $this->model->select_id_buku($id); //select data buku dengan kode buku...
			$row = $this->model->fetch($data); //fetch hasil select
			include "view/edit_buku.php"; //Menampilkan halaman add data
		}
		
		//fungsi update data
		function update_buku() {
			$kode = $_POST['kdb'];
			$nama = $_POST['nm_buku'];
			$pengarang = $_POST['pg_buku'];
			$penerbit = $_POST['pn_buku'];
			$tahun = $_POST['thn_buku'];
			
			
			//upload foto
			$tipefile = $_FILES['cover']['type'];
			$lokasifile = $_FILES['cover']['tmp_name'];
			$ukuranfile = $_FILES['cover']['size'];
			$namafile = $_FILES['cover']['name'];
			$namafoto = $kode.".".end(explode(".",$namafile));
			$tempatfile = "cover_buku/$namafoto";
			
			//Memindahkan ke database
			move_uploaded_file($lokasifile, "$tempatfile");
			
			$update = $this->model->update_b($kode, $nama, $pengarang, $penerbit, $tahun, $tempatfile);
			header("location:index.php?idb=index_buku");
		}
		
		function delete_buku($id){
			$delete = $this->model->delete_b($id);
			header("location:index.php?idb=index_buku");
		}
		// akhir halaman buku
		//-------------------------
		// awal halaman anggota
		function index_anggota() {
			$data = $this->model->select_all_anggota(); //pada class ini (controller), akses variabel model
			//akses fungsi selectALL (kalo bingung lihat di class model ada fungsi selectAll)
			include "view/index_anggota.php"; //memanggail view.php pada folder view
		}
		
		function view_insert_anggota() {
			$data = $this->model->get_max_kd_anggota();
			include "view/tambah_anggota.php"; //Menampilkan halaman add data
		}
		
		function insert_anggota() {
			$kode = $_POST['kd_anggota'];
			$nama = $_POST['nm_anggota'];
			$alamat = $_POST['alamat'];
			$tanggal_lahir = $_POST['tgl_lahir'];
			$telepon = $_POST['notel'];
			
			$insert = $this->model->insert_anggota($kode, $nama, $alamat, $tanggal_lahir, $telepon);
			header("location:index.php?ida=index_anggota");
		}
		
		function view_edit_anggota($id) {
			$data = $this->model->select_id_anggota($id); //select data buku dengan kode buku...
			$row = $this->model->fetch($data); //fetch hasil select
			include "view/edit_anggota.php"; //Menampilkan halaman add data
		}
		
		//fungsi update data
		function update_anggota() {
			$kode = $_POST['kda'];
			$nama = $_POST['nm_ag'];
			$alamat = $_POST['almt_ag'];
			$tanggal_lahir = $_POST['tgl_lahir'];
			$telepon = $_POST['no_telp'];
			
			$update = $this->model->update_anggota($kode, $nama, $alamat, $tanggal_lahir, $telepon);
			header("location:index.php?ida=index_anggota");
		}
		
		function delete_anggota($id){
			$delete = $this->model->delete_anggota($id);
			header("location:index.php?ida=index_anggota");
		}
		//akhir halaman anggota
		//---------------------------------------------------
		//awal halaman pinjam
		function index_pinjam() {
			$data = $this->model->select_all_pinjam(); //pada class ini (controller), akses variabel model
			//akses fungsi selectALL (kalo bingung lihat di class model ada fungsi selectAll)
			include "view/index_pinjam.php"; //memanggail view.php pada folder view
		}
		
		function view_insert_pinjam() {
			$data = $this->model->get_max_kd_pinjam();
			$data_b = $this->model->select_all_buku();
			$data_a = $this->model->select_all_anggota();
			
			include "view/tambah_pinjam.php";
		}
		
		function insert_pinjam() {
			$kode_p = $_POST['kd_pinjam'];
			$kode_b = $_POST['kd_buku'];
			$kode_a = $_POST['kd_anggota'];
			$tanggal_pinjam = $_POST['tgl_pinjam'];
			$tanggal_kembali = $_POST['tgl_kembali'];
			
			$insert = $this->model->insert_pinjam($kode_p, $kode_b, $kode_a, $tanggal_pinjam, $tanggal_kembali);
			header("location:index.php?idp=index_pinjam");
		}
		
		function view_edit_pinjam($id) {
			$data = $this->model->select_id_pinjam($id);
			$data_b = $this->model->select_all_buku();
			$data_a = $this->model->select_all_anggota();
			$row = $this->model->fetch($data);
			include "view/edit_pinjam.php";
		}
		
		//fungsi update data
		function update_pinjam() {
			$kode_p = $_POST['kd_pinjam'];
			$kode_b = $_POST['kd_buku'];
			$kode_a = $_POST['kd_anggota'];
			$tanggal_pinjam = $_POST['tgl_pinjam'];
			$tanggal_kembali = $_POST['tgl_kembali'];
			
			$update = $this->model->update_pinjam($kode_p, $kode_b, $kode_a, $tanggal_pinjam, $tanggal_kembali);
			header("location:index.php?idp=index_pinjam");
		}
		
		function delete_pinjam($id){
			$delete = $this->model->delete_pinjam($id);
			header("location:index.php?idp=index_pinjam");
		}
		
		function __destruct(){
			
		}
	}
?>