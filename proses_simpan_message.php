<?php
require_once "config/config.php";
// var_dump($_POST);die;


// $id_message	     = $_POST['id_message'];
$nama_pengirim	 = $_POST['nama_pengirim'];
$pesan	         = $_POST['pesan'];
// var_dump($total_bayar);die;
$query = "INSERT INTO messages(nama_pengirim,pesan)
	                          VALUES('$nama_pengirim','$pesan')";
// var_dump($query);die;
$result = $mysqli->query($query);
// var_dump($result);die;
// // $result = '';
if ($result) 
{
    // jika berhasil tampilkan pesan berhasil simpan data
    echo "sukses";	
} 
else 
{
	// jika gagal tampilkan pesan gagal simpan data
    echo "gagal";
}

?>