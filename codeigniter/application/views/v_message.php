<!DOCTYPE html>
<html>
<head>
  <title>Crud Messages</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>/assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
    <!-- datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/plugins/datepicker/css/datepicker.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/plugins/sweetalert/css/sweetalert.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/style.css">
    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script type="text/javascript" src="<?php echo base_url()?>/assets/js/fungsi_validasi_karakter.js"></script>
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
                      <a href="<?php echo base_url() ;?>dashboard" class="list-group-item" style="color: #212529;">Dashboard</a>
                      <a href="<?php echo base_url() ;?>message" class="list-group-item" style="color: #212529;">Messages</a>
                      <a href="<?php echo base_url() ;?>dashboard/logout" class="list-group-item" style="color: #212529;">Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <a class="btn btn-info" onclick="btnTambah()" href="#" data-toggle="modal" data-target="#modalTambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
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
                            <input type="text" value="" name="id_message"/> 
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
                            <button type="button" class="btn btn-info btn-submit" id="btnSave" onclick="btnSimpan()">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah -->

      

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
var save_method; //for save method string
var table;
$(document).ready(function() {
 
    //datatables
    table = $('#tabel_messages').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('message/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    
 
});

function btnTambah()
{
    // alert('test');
    save_method = 'add';
    $('#formTambah')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modalTambah').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Message'); // Set Title to Bootstrap modal title
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function btnSimpan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') 
    {
        url = "<?php echo site_url('message/ajax_add')?>";
    } 
    else
    {
        url = "<?php echo site_url('message/ajax_update')?>";
    }

 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formTambah').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                swal("Sukses!", "Data  berhasil disimpan !", "success");
                $('#modalTambah').modal('hide');
                reload_table();

            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',true); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function edit_message(id)
{
    save_method = 'update';

    $('#formTambah')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('message/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // console.log(data.id_message);
            $('[name="id_message"]').val(data.id_message);
            $('[name="nama_pengirim"]').val(data.nama_pengirim);
            $('[name="pesan"]').val(data.pesan);
            $('#modalTambah').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Message'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function delete_message(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('message/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                swal("Sukses!", "Data  berhasil dihapus !", "success");
                $('#modalTambah').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
    

</script>