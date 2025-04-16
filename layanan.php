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
              <h5 class="card-title">Data Layanan</h5>
              <?php if($_SESSION['ROLE']=='Admin'){?>
              <!-- Print Button -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahkategori"><i class="bi bi-plus-lg"></i> Tambah</button>
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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT * from kategori_layanan ORDER BY id_kategori_layanan DESC");
                      while($row = $query->fetch_array()){
                        $id_kategori_layanan=$row['id_kategori_layanan'];
										?>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo $row['nama_layanan'];?></td>
                    
                    <td style="text-align:center">
                        <a href="jenis_layanan.php?id_kategori_layanan=<?php echo $row['id_kategori_layanan'];?>&nama_layanan=<?php echo $row['nama_layanan'];?>"class="btn btn-warning btn-outline"><i class="bi bi-eye"></i></a>
												<?php if($_SESSION['ROLE']=='Admin'){?>
                          <a rel="tooltip"  title="Edit" id="<?php echo $row['id_kategori_layanan'] ?>" href="#edit_kategori_layanan<?php echo $row['id_kategori_layanan'];?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="bi bi-pencil-square"></i> </a>
                        <a rel="tooltip"  title="Delete" id="<?php echo $row['id_kategori_layanan'] ?>" href="#delete_kategori_layanan<?php echo $row['id_kategori_layanan'];?>"  data-toggle="modal"class="btn btn-danger btn-outline"><i class="bi bi-trash-fill"></i> </a>		
                    <?php }?></td>
											    <?php 
													require 'edit_layanan.php';require 'delete_layanan.php';
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
    </section>

  </main><!-- End #main -->

  <?php include ('footer.php');?>
      <?php include ('script.php');?>

</body>

</html>