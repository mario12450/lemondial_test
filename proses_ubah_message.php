<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // panggil file config.php untuk koneksi ke database
    require_once "config/config.php";
    // var_dump($_POST);die;
    if (isset($_POST['id_message'])) {

        // ambil data hasil post dari ajax
        $id_message = $mysqli->real_escape_string(trim($_POST['id_message']));        
        $nama_pengirim  = $mysqli->real_escape_string(trim($_POST['nama_pengirim_ubah']));
        $pesan  = $mysqli->real_escape_string(trim($_POST['pesan_ubah']));

        // perintah query untuk mengubah data pada tabel message
        $query = "UPDATE messages SET nama_pengirim      = '$nama_pengirim',
                                                       pesan  = '$pesan'                                                      
                                                 WHERE id_message = '$id_message'";
        // var_dump($query);die;
        $update = $mysqli->query($query);
        // var_dump($update);die;


        // cek query
        if ($update) {
            // jika berhasil tampilkan pesan berhasil ubah data
            echo "sukses";
        } else {
            // jika gagal tampilkan pesan gagal ubah data
            echo "gagal";
        }
    }
    // tutup koneksi
    $mysqli->close();   
} else {
    echo '<script>window.location="dashboard.php"</script>';
}
?>