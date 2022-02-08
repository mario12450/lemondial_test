<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mario.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mario2.css"> -->

    <title>Dashboard</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item active">MAIN MENU</li>
              <a href="<?php echo base_url() ?>dashboard" class="list-group-item" style="color: #212529;">Dashboard</a>
              <a href="<?php echo base_url() ?>message" class="list-group-item" style="color: #212529;">Message</a>
              <a href="<?php echo base_url() ?>/dashboard/logout" class="list-group-item" style="color: #212529;">Logout</a>
            </ul>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <label>DASHBOARD</label>
                <hr>

                Selamat Datang <?php echo $this->session->userdata("nama_lengkap") ?>

              </div>
            </div>
          </div>

          <div class="col-md-12 mt-4">
            <div class="card">
              <div class="card-body">
                <label>PROFILE</label>
                <hr>

                Selamat Datang <?php echo $this->session->userdata("nama_lengkap") ?>

                <!-- Start Mario.css -->
                <!-- <div class="wrapper"> -->
                  <div class="gallery">
                    <ul>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/9.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/2.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/3.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/9.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/2.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/3.png"></li>
                      <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53819/3.png"></li>
                    </ul>
                  </div>
                 
                <!-- </div> -->
                <!-- Tutup Mario.css -->

                

              </div>
            </div>
          </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>