<?php
	class model {
		//WebsitePraktis.com
		//Membuat koneksi ke database
		public $connect;
		function __construct() {
			$this->connect = mysqli_connect("localhost", "root", "12345678", "bukudb");
		}
		
		//Membuat eksekusi perintah query
		function execute($query) {
			return mysqli_query($this->connect,$query);
		}
		
		//awal halaman buku
		//Menampilkan semua data di dalam tabel
		function select_all_buku() {
			$query = "select * from buku";
			return $this->execute($query);
		}
		
		function get_max_kd_buku(){
			$query = "select max(kode_buku)as kode from buku"; //query untuk Membuat kode buku otomatis
			return $this->execute($query);
		}
		
		function select_id_buku($id) {
			$query = "select * from buku where kode_buku='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Delete
		function delete_b($id) {
			$query = "delete from buku where kode_buku='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Input
		function insert_b($kode, $nama, $pengarang, $penerbit, $tahun, $tempatfile) {
			$query = "insert into buku
			(kode_buku,nama_buku,pengarang,penerbit,tahun_terbit,cover)
			values ('$kode', '$nama', '$pengarang', '$penerbit', '$tahun', '$tempatfile')";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Update
		function update_b($kode, $nama, $pengarang, $penerbit, $tahun, $tempatfile) {
			$query = "update buku set nama_buku='$nama', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', cover='$tempatfile'
			where buku.kode_buku='$kode'";
			return $this->execute($query);
		}
		
		//akhir halaman buku
		//-------------------------------
		//awal halaman anggota
		
		function select_all_anggota() {
			$query = "select * from anggota";
			return $this->execute($query);
		}
		
		function get_max_kd_anggota(){
			$query = "select max(kode_anggota)as kode from anggota"; //query untuk Membuat kode buku otomatis
			return $this->execute($query);
		}
		
		function select_id_anggota($id) {
			$query = "select * from anggota where kode_anggota='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Delete
		function delete_anggota($id) {
			$query = "delete from anggota where kode_anggota='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Input
		function insert_anggota($kode, $nama, $alamat, $tanggal_lahir, $telepon) {
			$query = "insert into anggota
			(kode_anggota,nama_anggota,alamat,tanggal_lahir,no_telp)
			values ('$kode', '$nama', '$alamat', '$tanggal_lahir', '$telepon')";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Update
		function update_anggota($kode, $nama, $alamat, $tanggal_lahir, $telepon) {
			$query = "update anggota set nama_anggota='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir', no_telp='$telepon'
			where anggota.kode_anggota='$kode'";
			return $this->execute($query);
		}
		//akhir halamana anggota
		//----------------------------------------------------------------------------------------
		//awal halaman pinjam
		function select_all_pinjam() {
			$query = "select
			pinjam.kode_pinjam,
			pinjam.kode_buku,
			pinjam.kode_anggota,
			buku.nama_buku,
			anggota.nama_anggota,
			pinjam.tgl_pinjam,
			pinjam.tgl_kembali
			FROM pinjam 
			JOIN buku ON pinjam.kode_buku = buku.kode_buku
			JOIN anggota ON pinjam.kode_anggota = anggota.kode_anggota";
			return $this->execute($query);
		}
		
		function get_max_kd_pinjam(){
			$query = "select max(kode_pinjam)as kode from pinjam"; //query untuk Membuat kode buku otomatis
			return $this->execute($query);
		}
		
		function select_id_pinjam($id) {
			$query = "select * from pinjam where kode_pinjam='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Delete
		function delete_pinjam($id) {
			$query = "delete from pinjam where kode_pinjam='$id'";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Input
		function insert_pinjam($kode_p, $kode_b, $kode_a, $tanggal_pinjam, $tanggal_kembali) {
			$query = "insert into pinjam
			(kode_pinjam, kode_buku,kode_anggota,tgl_pinjam,tgl_kembali)
			values ('$kode_p', '$kode_b', '$kode_a', '$tanggal_pinjam', '$tanggal_kembali')";
			return $this->execute($query);
		}
		
		//Membuat fungsi function Update
		function update_pinjam($kode_p, $kode_b, $kode_a, $tanggal_pinjam, $tanggal_kembali) {
			$query = "UPDATE pinjam SET 
						kode_buku = '$kode_b',
						kode_anggota = '$kode_a',
						tgl_pinjam = '$tanggal_pinjam',
						tgl_kembali = '$tanggal_kembali'
					  WHERE kode_pinjam = '$kode_p'";
			return $this->execute($query);
		}
		//akhir halaman pinjam
		//Membuat fungsi function secara berulang/array
		function fetch($var) {
			return mysqli_fetch_array($var);
		}
		
		//fungsi construct adalah desctruct untuk menghapus inisialisasi class pada memori
		function __destruct() {
			
		}
	}
?>