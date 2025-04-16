<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
    <!-- Navigation -->
    <?php include ('side_bar.php');?>

  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-4">
            <!-- Sales Card -->
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah User</h5>

                <div class="d-flex align-items-center">
                  <div class="ps-3">
                    <h6><?php 
                      require 'dbcon.php';
                      $query1 = $conn->query("SELECT COUNT(*) as jml FROM user");
                      $row1 = $query1->fetch_array();
                      echo $row1['jml'];
                    ?></h6>

                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
        </div>
        <!-- Left side columns -->
        <div class="col-lg-4">
            <!-- Sales Card -->
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah Transaksi</h5>

                <div class="d-flex align-items-center">
                  <div class="ps-3">
                    <h6><?php 
                      require 'dbcon.php';
                      $query1 = $conn->query("SELECT COUNT(*) as jml FROM transaksi");
                      $row1 = $query1->fetch_array();
                      echo $row1['jml'];
                    ?></h6>

                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
        </div>
        <!-- Left side columns -->
        <div class="col-lg-4">
            <!-- Sales Card -->
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah Transaksi Selesai</h5>

                <div class="d-flex align-items-center">
                  <div class="ps-3">
                    <h6><?php 
                      require 'dbcon.php';
                      $query1 = $conn->query("SELECT COUNT(*) as jml FROM transaksi where status_ambil LIKE '%Sudah diambil%'");
                      $row1 = $query1->fetch_array();
                      echo $row1['jml'];
                    ?></h6>

                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
        </div>
        
  </main><!-- End #main -->

  <?php include ('footer.php');?>
      <?php include ('script.php');?>

</body>

</html>