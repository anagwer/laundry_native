<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
<?php 
  require 'dbcon.php';
  $id_transaksi = $_GET['id_transaksi'];
  $query = $conn->query("SELECT transaksi.*,user.*,pelanggan.*,jenis_layanan.*
                          FROM transaksi
                          JOIN user ON user.id_user = transaksi.id_user
                          JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan
                          JOIN jenis_layanan ON jenis_layanan.id_jenis_layanan = transaksi.id_jenis_layanan
                  where id_transaksi='$id_transaksi' ");
  $row = $query->fetch_array();
  ?>
<!-- Table with stripped rows -->
  <div class="row mb-3">
    <div class="col-8">
      <h3 class="mb-2" style="font-weight:bold;">Nota<br>
        Laundry<br></h3>
        <p style="font-weight:bold;">
        Jl. Jakarta xxx<br>
        089xxxx
          </p>
    </div>
    <div class="col-4">
      <p class="text-end mb-2" style="font-weight:bold;">Tgl Transaksi: <?php echo date('d-m-Y H:i:s', strtotime($row['tgl_transaksi']));?></p>
    </div>
    <div class="col-6">
      <p class="mb-2">Info Pelanggan:</p>
    </div>
    <div class="col-6">
      <p class="mb-2" style="font-weight:bold;">Invoice: <?php echo '#INV'.$row['id_transaksi'].date('dmY', strtotime($row['tgl_transaksi']));?></p>
    </div>
    <div class="col-4">
      <p><b><?php echo $row['nama'];?></b><br>
        <?php echo $row['jns_kelamin'];?><br>
        No Telp :<?php echo $row['no_telp'];?><br>
        <?php if($row['antar_jemput']=='Ya'){
          echo '<b>Layanan Antar Jemput</b><br>';
          echo 'Alamat Antar: '.$row['alamat_antar'];
        }else{
          ?>
        Alamat :<?php echo $row['alamat'];?><br>
        <?php }?>
      </p>
    </div>
    <div class="col-8">
      <p>Petugas Entri: <?php echo $row['username'];?><br>
        Masuk: <?php echo $row['tgl_transaksi'];?><br>
        Selesai: <?php echo $row['tgl_selesai'];?><br>
        Diambil: <?php if($row['tgl_selesai']!='0000-00-00'){echo $row['tgl_selesai'];}else{ echo '-';}?><br>
    </p>
    </div>
  </div>

<table style="width:100%" class="table">
  <thead>
    <tr>
      <th scope="col">Kategori</th>
      <th scope="col">Jenis</th>
      <th scope="col">Tarif</th>
      <th scope="col">Berat</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php
      $id_kategori_layanan = $row['id_kategori_layanan'];
              $query1 = $conn->query("SELECT * FROM kategori_layanan where id_kategori_layanan='$id_kategori_layanan'");
              $row1 = $query1->fetch_array();
              echo $row1['nama_layanan'];
              ;?></td>
      <td><?php echo $row['jenis_layanan'];?></td>
      <td><?php echo 'Rp. '.number_format($row['tarif'], 0, ",", ".");?></td>
      <td><?php echo $row['berat'];?></td>
      <td><?php echo $row['status_bayar'];?><br>
          <?php echo $row['status_ambil'];?></td>
    </tr>
  </tbody>
</table>
<div class="col-12">
      <p class="text-end">Tgl Print: <?php echo date('d-m-Y');?>
    </p><h1 class="text-end"><b><?php echo 'Rp. '.number_format($row['total'], 0, ",", ".");?></b></h1>
    </div>
<hr>

      <?php include ('script.php');?>

</body>

</html>