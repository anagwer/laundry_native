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
<hr>
<h3 class="text-center mb-3"><b>Data Barang</b></h3>

<table class="table table-bordered">
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
                    <td><?php if($row['tgl_masuk']=='0000-00-00'){
                            echo '-';}else{
                              echo $row['tgl_masuk'];
                            }?></td>
                    <td><?php if($row['stok_masuk']=='0'){
                            echo '-';}else{
                              echo $row['stok_masuk'];
                            };?></td>
                    <td><?php if($row['tgl_keluar']=='0000-00-00'){
                            echo '-';}else{
                              echo $row['tgl_keluar'];
                            }?></td>
                    <td><?php if($row['stok_keluar']=='0'){
                            echo '-';}else{
                              echo $row['stok_keluar'];
                            };?></td>
                    <td><?php echo $row['sisa_stok'];?></td>
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