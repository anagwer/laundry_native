<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
    <!-- Navigation -->
    <?php include ('side_bar.php');?>

  <main id="main" class="main">
    <section class="section">
      <div class="row">
      <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Data Barang</h3>
              <?php if($_SESSION['ROLE']=='Admin'){?>
              <!-- Print Button -->
              <form method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-4">
                          <input type="date" class="form-control" name="tgl1">
                      </div>
                      <div class="col-4">
                          <input type="date" class="form-control" name="tgl2">
                      </div>
                      <div class="col-4">
                      <button type="submit" name="proses" class="btn btn-success"><i class="bi bi-printer"></i> Print Laporan</button>
                      </div>
                  </div>
                  <br>
              </form>

              <?php
              if (isset($_POST['proses'])) {
                  $tgl1 = $_POST['tgl1'];
                  $tgl2 = $_POST['tgl2'];
              ?>
              <script>
                  function printNota() {
                      var printWindow = window.open('print_barang.php?tgl1=<?php echo $tgl1 ?>&tgl2=<?php echo $tgl2 ?>');
                      printWindow.onload = function() {
                          printWindow.print();
                          printWindow.onafterprint = function() {
                              printWindow.close();
                          };
                      };
                  }
                  printNota();
              </script>
              <?php } }?>
               
                <hr>
                
              <!-- Table with stripped rows -->
               
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Sisa Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT b.*
                                FROM barang b
                                JOIN (
                                    SELECT nm_barang, MAX(id_barang) AS latest_id
                                    FROM barang
                                    GROUP BY nm_barang
                                ) latest ON b.id_barang = latest.latest_id
                                ORDER BY b.id_barang DESC;
                                ");
                      while($row = $query->fetch_array()){
                        $id_barang=$row['id_barang'];
										?>
                  <tr>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo $row['nm_barang'];?></td>
                    <td><?php echo $row['sisa_stok'];?></td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
            </div>
          </div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Data Stok Keluar Masuk Barang</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-lg"></i> Tambah</button>
                <?php include ('add_barang.php');?>
                <hr>
                
              <!-- Table with stripped rows -->
               
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Pengelola</th>
                    <th scope="col">Tgl Masuk</th>
                    <th scope="col">Jml Masuk</th>
                    <th scope="col">Tgl Keluar</th>
                    <th scope="col">Jml Keluar</th>
                    <th scope="col">Sisa Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT barang.*,user.* FROM barang JOIN user on user.id_user=barang.id_user order by id_barang DESC");
                      while($row = $query->fetch_array()){
                        $id_barang=$row['id_barang'];
										?>
                  <tr>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo $row['nm_barang'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['tgl_masuk'];?></td>
                    <td><?php echo $row['stok_masuk'];?></td>
                    <td><?php echo $row['tgl_keluar'];?></td>
                    <td><?php echo $row['stok_keluar'];?></td>
                    <td><?php echo $row['sisa_stok'];?></td>
                    <td style="text-align:center">
                      <a rel="tooltip"  title="Delete" id="<?php echo $row['id_barang'] ?>" href="#delete_barang<?php echo $row['id_barang'];?>"  data-toggle="modal"class="btn btn-danger btn-outline"><i class="bi bi-trash-fill"></i> </a>		
										</td>
                        <?php 
                        require 'delete_barang.php';
												?>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
            </div>
          </div>

        </div>

        

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include ('footer.php');?>
      <?php include ('script.php');?>

</body>

</html>