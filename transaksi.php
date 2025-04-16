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
              <h3 class="card-title">Data Transaksi</h3>
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
                      var printWindow = window.open('print_transaksi.php?tgl1=<?php echo $tgl1 ?>&tgl2=<?php echo $tgl2 ?>');
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-lg"></i> Tambah</button>
                <?php include ('add_transaksi.php');?>
                <hr>
                
              <!-- Table with stripped rows -->
               
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Invoice</th>
                    <?php if($_SESSION['ROLE']=='Admin'){?>
                    <th scope="col">Pengelola</th>
                    <?php }?>
                    <th scope="col">Layanan</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Tgl transaksi</th>
                    <th scope="col">Tgl Selesai</th>
                    <th scope="col">Antar Jemput</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status Bayar</th>
                    <th scope="col">Status Ambil</th>
                    <th scope="col">Tgl Ambil</th>
                    <th scope="col">Konfirmasi</th>
                    <th scope="col">Bukti Bayar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      if($_SESSION['ROLE']!='Admin'){
                      $query = $conn->query("SELECT *
                                              FROM transaksi
                                              WHERE id_user = '$id'");
                      }else{
                        $query = $conn->query("SELECT *
                                              FROM transaksi");
                      }
                      while($row = $query->fetch_array()){
                         $id_transaksi = $row['id_transaksi'];
                        $id_user = $row['id_user'];
                        $id_pelanggan = $row['id_pelanggan'];
                        $id_jenis_layanan = $row['id_jenis_layanan'];

										?>
                  <tr>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo '#INV'.$row['id_transaksi'].date('dmY', strtotime($row['tgl_transaksi']));?></td>
                    <?php 
                    $query1 = $conn->query("SELECT user.*,pelanggan.* FROM user join pelanggan on user.id_user=pelanggan.id_user where user.id_user='$id_user'");
                    $row1 = $query1->fetch_array();
                    if($_SESSION['ROLE']=='Admin'):?>
                    <td><?php 
                    echo $row1['username'];?></td>
                    <?php endif; ?>
                    <td><?php
                    $query2 = $conn->query("SELECT jenis_layanan.*, kategori_layanan.* FROM kategori_layanan join jenis_layanan on kategori_layanan.id_kategori_layanan=jenis_layanan.id_kategori_layanan where jenis_layanan.id_jenis_layanan='$id_jenis_layanan'");

                    $row2 = $query2->fetch_array();
                    echo $row2['nama_layanan'].'-'.$row2['jenis_layanan'];
                    ;?></td>
                    <td><?php echo $row1['nama'];?></td>
                    <td><?php echo $row['tgl_transaksi'];?></td>
                    <td><?php echo $row['tgl_selesai'];?></td>
                    <td><?php echo $row['antar_jemput'];?></td>
                    <td><?php echo $row['alamat_antar'];?></td>
                    <td><?php echo $row['berat'];?></td>
                    <td><?php echo 'Rp. '.number_format($row['total'], 0, ",", ".");?></td>
                    <td><?php echo $row['status_bayar'];?></td>
                    <td><?php echo $row['status_ambil'];?></td>
                    <td><?php 
                          if($row['tgl_jemput']=='1970-01-01' || $row['tgl_jemput']=='0000-00-00'){
                            echo '-';}else{
                              echo $row['tgl_jemput'];
                            }?></td>
                    <td><?php echo $row['konfirmasi'];?></td>
                    <td>
                      <?php if($row['metode_bayar']=='Cash'){
                        echo '-';
                      }else{?>
                      <a rel="tooltip"  title="Lihat" id="<?php echo $row['id_transaksi'] ?>" href="#lihat_transaksi<?php echo $row['id_transaksi'];?>"  data-toggle="modal"class="btn btn-warning btn-outline"><i class="bi bi-eye"></i> </a></td>
                      <?php } ?>
                      
                    <td style="text-align:center">
                      <a href="javascript:void(0);" class="btn btn-primary" onclick="printNota(<?php echo $id_transaksi;?>);"><i class="bi bi-printer"></i></a>
                    
                      <?php if($_SESSION['ROLE']=='Admin' || $row['status_ambil']=='Belum Diambil'){?>
                      <a rel="tooltip"  title="Edit" id="<?php echo $row['id_transaksi'] ?>" href="#edit_transaksi<?php echo $row['id_transaksi'];?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="bi bi-pencil-square"></i> </a>
                      <?php }?>
                      <?php if($row['konfirmasi']=='Belum'){?>
                      <a rel="tooltip"  title="Delete" id="<?php echo $row['id_transaksi'] ?>" href="#delete_transaksi<?php echo $row['id_transaksi'];?>"  data-toggle="modal"class="btn btn-danger btn-outline"><i class="bi bi-trash-fill"></i> </a>		
                      <?php }?>
										</td>
                        <?php 
                        require 'edit_transaksi.php';require 'delete_transaksi.php';
												?>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
                  <script>
                    function printNota(id_transaksi) {
                        var printWindow = window.open('print_nota.php?id_transaksi='+ id_transaksi, '_blank');
                        printWindow.onload = function() {
                            printWindow.print();
                            
                            // Check for print dialog closure and close the window
                            printWindow.onafterprint = function() {
                                printWindow.close();
                            };
                        };
                    }
                    </script>
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