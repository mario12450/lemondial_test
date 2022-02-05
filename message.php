<?php

  session_start();
  if(!$_SESSION['id_user'])
  {
    header("location: login.php");
  } 

?>

<!DOCTYPE html>
<html>
<head>
  <title>Crud Messages</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
    <!-- datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script type="text/javascript" src="assets/js/fungsi_validasi_karakter.js"></script>
</head>
<body>
<div class="container" style="margin-top: 50px">
  <div class="row">
  


  <div class="container-fluid">
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal"><i class="fas fa-shopping-cart title-icon"></i> Data Messages Crud menggunakan datatables serverside</h5>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">  
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
               
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a href="dashboard.php" class="list-group-item" style="color: #212529;">Dashboard</a>
                      <a href="message.php" class="list-group-item" style="color: #212529;">Messages</a>
                      <a href="logout.php" class="list-group-item" style="color: #212529;">Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <a class="btn btn-info" id="btnTambah" href="#" data-toggle="modal" data-target="#modalTambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
        </div>
    </div>

  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Tabel transaksi penjualan untuk menampilkan data transaksi penjualan dari database -->
                <table id="tabel_messages" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <!-- <th>ID Messages</th> -->
                            <th>Nama Pengirim</th>
                            <th>Pesan</th>  
                            <th></th>                          
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

        <!-- Modal tambah data transaksi penjualan -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Input Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formTambah">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" class="form-control date-picker" id="nama_pengirim" name="nama_pengirim" autocomplete="off" value="">
                            </div>

                            <div class="form-group">
                                <label>Pesan</label>
                                <input type="text" class="form-control" id="pesan" name="pesan" autocomplete="off">
                            </div>

                           
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-submit" onclick="btnSimpan()">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Input Data Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formUbah">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>ID Messages</label>
                                <input type="text" class="form-control" id="id_message" name="id_message" autocomplete="off" readonly>
                            </div>

                             <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" class="form-control date-picker" id="nama_pengirim_ubah" name="nama_pengirim_ubah"  value="">
                            </div>

                            <div class="form-group">
                                <label>Pesan</label>
                                <input type="text" class="form-control" id="pesan_ubah" name="pesan_ubah">
                            </div>

                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-submit" onclick="UpdateData()">Update </button>
                            <button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     </div>
    </div>

        <!-- End Modal Edit -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <!-- fontawesome Plugin JS -->
  <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
  <!-- DataTables Plugin JS -->
  <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
  <!-- datepicker Plugin JS -->
  <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- SweetAlert Plugin JS -->
  <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
  
  
   
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
           };
        };

      var table = $('#tabel_messages').DataTable( {
                "bAutoWidth": false,
                "scrollY": '58vh',
                "scrollCollapse": true,
                "processing": true,
                "serverSide": true,
                "ajax": 'data_messages.php',     // panggil file data_transaksi.php untuk menampilkan data transaksi dari database
                "columnDefs": [ 
                    { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'center' },
                    { "targets": 1, "width": '80px', "className": 'center' },
                    { "targets": 2, "width": '80px', "className": 'center' },                  
                    {
                      "targets": 3, "data": null, "orderable": false, "searchable": false, "width": '70px', "className": 'center',
                      "render": function(data, type, row) {
                        
                          var btn = "<a style=\"margin-right:2px\" title=\"Ubah\" class=\"btn btn-info btn-sm getEdit\"  id='getEdit' href=\"#\"><i class=\"fas fa-edit\"></i></a><a title=\"Hapus\" class=\"btn btn-danger btn-sm btnHapus\" href=\"#\"><i class=\"fas fa-trash\"></i></a>";
                          return btn;
                      } 
                    } 
                ],
                "order": [[ 1, "desc" ]],           // urutkan data berdasarkan id_message secara descending
                "iDisplayLength": 2 ,              // tampilkan 10 data
                "rowCallback": function (row, data, iDisplayIndex) {
                    var info   = this.fnPagingInfo();
                    var page   = info.iPage;
                    var length = info.iLength;
                    var index  = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                },
            } );

            // Tampilkan Form Edit Data
            $('#tabel_messages tbody').on( 'click', '.getEdit', function (){
                var data = table.row( $(this).parents('tr') ).data();
                var id_message = data[ 3 ];
                // alert('tes');
                $.ajax({
                    type : "GET",
                    url  : "get_message.php",
                    data : {id_message:id_message},
                    dataType : "JSON",
                    success: function(result){
                        console.log(result);                      
                       
                        // tampilkan modal ubah data message
                        $('#modalEdit').modal('show');
                        // tampilkan data transaksi
                        $('#id_message').val(result.id_message);
                        $('#nama_pengirim_ubah').val(result.nama_pengirim);
                        $('#pesan_ubah').val(result.pesan);
                     
                    }
                });
            });
            //Tutup Form Edit Data

             $('#btnTambah').click(function(reload){
                // reset form
                $('#formTambah')[0].reset();
            });

            //proses hapus/delete data message
            $('#tabel_messages tbody').on( 'click', '.btnHapus', function (){
                var data = table.row( $(this).parents('tr') ).data();
                // tampilkan notifikasi saat akan menghapus data
                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Anda akan menghapus data messages  dengan ID message : "+ data[ 1 ] +"",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    closeOnConfirm: false
                }, 
                // jika dipilih ya, maka jalankan perintah hapus data
                function () {
                    var id_message = data[ 3 ];
                    $.ajax({
                        type : "POST",
                        url  : "proses_hapus_message.php",
                        data : {id_message:id_message},
                        success: function(result){                          // ketika sukses menghapus data
                            if (result==="sukses") {
                                // tampilkan pesan sukses hapus data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil dihapus.", "success");
                                // tampilkan data transaksi
                                var table = $('#tabel_messages').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal hapus hapus data
                                swal("Gagal!", "Data tidak bisa dihapus.", "error");
                            }
                        }
                    });
                });
            });
            //tutup proses delete

  } );      

  function btnSimpan()
  {
    let nama_pengirim   = $('#nama_pengirim').val();
    let pesan = $('#pesan').val();
   

    if(nama_pengirim == "" || nama_pengirim == 0 || nama_pengirim == null)
    {
      alert("Mohon isi Nama Pengirim terlebih dahulu !");
    }

    else
    {
      var data = $('#formTambah').serialize();
      // alert(data);
      $.ajax({
                type : "POST",
                url  : "proses_simpan_message.php",
                data : data,
                success: function(result)
                {                          
                  // ketika sukses menyimpan data
                    if (result==="sukses") 
                    {
                        // tutup modal tambah data transaksi
                        $('#modalTambah').modal('hide');
                        // tampilkan pesan sukses simpan data
                        swal("Sukses!", "Data Message berhasil disimpan.", "success");
                        // tampilkan data transaksi
                        var table = $('#tabel_messages').DataTable(); 
                        table.ajax.reload( null, false );
                    } 
                    else 
                    {
                        // tampilkan pesan gagal simpan data
                        swal("Gagal!", "Data Message tidak bisa disimpan.", "error");
                    }
                }
            });
    }
    
  } 

  function UpdateData()
    {
         // Proses Ubah Data
        // Validasi form input
        // jika tanggal_ubah kosong
        if ($('#nama_pengirim_ubah').val()=="")
        {
            // focus ke input tanggal_ubah
            $( "#nama_pengirim_ubah" ).focus();
            // tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "nama pengirim tidak boleh kosong.", "warning");
        }
        // jika nama_barang_ubah kosong
        else if ($('#pesan_ubah').val()=="")
        {
            // focus ke input nama_barang_ubah
            $( "#pesan_ubah" ).focus();
            // tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "pesan tidak boleh kosong.", "warning");
        }
      
        // jika semua data sudah terisi, jalankan perintah ubah data
        else
        {
          // alert('test');
            var data = $('#formUbah').serialize();
            $.ajax({
                type : "POST",
                url  : "proses_ubah_message.php",
                data : data,
                success: function(result){                          // ketika sukses mengubah data
                  // console.log(result);
                    if (result==="sukses") {
                        // tutup modal ubah data transaksi
                        $('#modalEdit').modal('hide');
                        // tampilkan pesan sukses ubah data
                        swal("Sukses!", "Data Message  berhasil diubah.", "success");
                        
                        // tampilkan data transaksi
                        var table = $('#tabel_messages').DataTable(); 
                        table.ajax.reload( null, false );
                    } else {
                        // tampilkan pesan gagal ubah data
                        swal("Gagal!", "Data Message tidak bisa diubah.", "error");
                    }
                }
            });
            return false;
        }
            
    }

    

</script>