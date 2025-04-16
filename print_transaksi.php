<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
<?php 
  require 'dbcon.php';
  $tgl1 = $_GET['tgl1'];
  $tgl2 = $_GET['tgl2'];
  ?>
<!-- Table with stripped rows -->
  <div class="row">
  <div class="col-8">
      <h3 class="mb-2" style="font-weight:bold;">Nota<br>
        Laundry<br></h3>
        <p style="font-weight:bold;">
        Jl. Jakarta xxx<br>
        089xxxx
          </p>
    </div>
    <div class="col-4">
      <p class="text-end mb-2" style="font-weight:bold;">Tgl Print: <?php echo date('d-m-Y H:i:s');?></p>
    </div>
  </div>
<hr><h3 class="text-center mb-3"><b>Data Transaksi</b></h3>

              <table class="table table-bordered">
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
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT transaksi.*,user.*,pelanggan.*,jenis_layanan.*
                                              FROM transaksi
                                              JOIN user ON user.id_user = transaksi.id_user
                                              JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan
                                              JOIN jenis_layanan ON jenis_layanan.id_jenis_layanan = transaksi.id_jenis_layanan
                                              where tgl_transaksi between '$tgl1' and '$tgl2'");
                      
                      while($row = $query->fetch_array()){
                        $id_transaksi=$row['id_transaksi'];
                        $id_kategori_layanan=$row['id_kategori_layanan'];
										?>
                  <tr>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo '#INV'.$row['id_transaksi'].date('dmY', strtotime($row['tgl_transaksi']));?></td>
                    <?php if($_SESSION['ROLE']=='Admin'){?>
                    <td><?php echo $row['username'];?></td>
                    <?php }?>
                    <td><?php
                    $query1 = $conn->query("SELECT * FROM kategori_layanan where id_kategori_layanan='$id_kategori_layanan'");
                    $row1 = $query1->fetch_array();
                    echo $row1['nama_layanan'].'-'.$row['jenis_layanan'];
                    ;?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['tgl_transaksi'];?></td>
                    <td><?php echo $row['tgl_selesai'];?></td>
                    <td><?php echo $row['antar_jemput'];?></td>
                    <td><?php echo $row['alamat_antar'];?></td>
                    <td><?php echo $row['berat'];?></td>
                    <td><?php echo 'Rp. '.number_format($row['total'], 0, ",", ".");?></td>
                    <td><?php echo $row['status_bayar'];?><br>
                    <?php echo $row['status_ambil'];?></td>
                    
                      
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="col-12 text-center">
                <p><b>LAUNDRY<br>
                Periode <?php echo $tgl1." sampai ".$tgl2;?>
                    </b>  </p>
              <hr>

      <?php include ('script.php');?>

</body>

</html>