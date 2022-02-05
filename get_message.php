<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
	// panggil file config.php untuk koneksi ke database
	require_once "config/config.php";
	// jika tombol get ubah diklik
	// var_dump($_GET);die;
    if (isset($_GET['id_message'])) {
    	// ambil data get dari ajax
    	$id_message = $_GET['id_message'];
		// perintah query untuk menampilkan data dari tabel transaksi berdasarkan id_transaksi
		// $query = "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'";
		// var_dump($query);die;
		$result = $mysqli->query("SELECT * FROM messages WHERE id_message='$id_message'")
		                          or die('Ada kesalahan pada query tampil data messages: '.$mysqli->error);
		  // var_dump($result);die;
		$data = $result->fetch_assoc();
		// var_dump($data);die;
		
	}
	// tutup koneksi
	$mysqli->close(); 
	 
	echo json_encode($data); 
	// var_dump($data);die;
} else {
    echo '<script>window.location="dashboard.php"</script>';
}
?>