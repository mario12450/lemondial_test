<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'messages';
    // Table's primary key
    $primaryKey = 'id_message';

    $columns = array(
        array( 'db' => 'id_message', 'dt' => 1 ),      
        array( 'db' => 'nama_pengirim', 'dt' => 2 ),
        array( 'db' => 'pesan', 'dt' => 3 ),      
        array( 'db' => 'id_message', 'dt' => 4 )
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="index.php"</script>';
}
?>