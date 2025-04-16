<?php include ('session.php');?>
<?php include ('head.php');?>


<body>
    <!-- Navigation -->
    <?php include ('side_bar.php');?>

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <a href="layanan.php" class="btn btn-danger mb-2"><i class="bi bi-arrow-left"></i> Kembali</a>
          <div class="card">
            <div class="card-body">
              <?php $id_kategori_layanan=$_GET['id_kategori_layanan'];
              $nama_layanan=$_GET['nama_layanan'];?>
              <h5 class="card-title">Data Jenis Layanan : <b class="text-danger"><?php echo $nama_layanan;?></b></h5>
              <?php if($_SESSION['ROLE']=='Admin'){?>
              <!-- Print Button -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahjenis"><i class="bi bi-plus-lg"></i> Tambah</button>
                <?php include ('add_layanan.php');?>
                <hr>
                <?php }?>
                
              <!-- Table with stripped rows -->
               <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Estimasi</th>
                    <th scope="col">Waktu</th>
                    <?php if($_SESSION['ROLE']=='Admin'){?>
                    <th scope="col">Aksi</th>
                    <?php }?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT * from jenis_layanan where id_kategori_layanan='$id_kategori_layanan' ORDER BY id_jenis_layanan DESC");
                      while($row = $query->fetch_array()){
                        $id_jenis_layanan=$row['id_jenis_layanan'];
										?>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo $row['jenis_layanan'];?></td>
                    <td><?php echo $row['estimasi_waktu'];?> Hari</td>
                    <td><?php echo $row['tarif'];?></td>
                    <?php if($_SESSION['ROLE']=='Admin'){?>
                    <td style="text-align:center">
												<a rel="tooltip"  title="Edit" id="<?php echo $row['id_jenis_layanan'] ?>" href="#edit_jenis_layanan<?php echo $row['id_jenis_layanan'];?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="bi bi-pencil-square"></i> </a>
                        <a rel="tooltip"  title="Delete" id="<?php echo $row['id_jenis_layanan'] ?>" href="#delete_jenis_layanan<?php echo $row['id_jenis_layanan'];?>"  data-toggle="modal"class="btn btn-danger btn-outline"><i class="bi bi-trash-fill"></i> </a>		
                    </td>
											    <?php 
													require 'edit_layanan.php';require 'delete_layanan.php';
												?>
                        <?php }?>
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
    </section>

  </main><!-- End #main -->

  <?php include ('footer.php');?>
      <?php include ('script.php');?>

</body>

</html>