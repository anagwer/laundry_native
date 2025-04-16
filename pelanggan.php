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
              <h3 class="card-title">Data Pelanggan</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-lg"></i> Tambah</button>
                <?php include ('add_pelanggan.php');?>
                <hr>
                
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No telp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jns kelamin</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											require 'dbcon.php';
											$bool = false;
                      $no=1; $id=$_SESSION['ID'];
                      $query = $conn->query("SELECT * FROM pelanggan order by id_pelanggan DESC");
                      while($row = $query->fetch_array()){
                        $id_pelanggan=$row['id_pelanggan'];
										?>
                  <tr>
                    <th scope="row"><?php echo $no; $no++;?></th>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['no_telp'];?></td>
                    <td><?php echo $row['alamat'];?></td>
                    <td><?php echo $row['jns_kelamin'];?></td>
                    <td style="text-align:center">
                      <a rel="tooltip"  title="Edit" id="<?php echo $row['id_pelanggan'] ?>" href="#edit_pelanggan<?php echo $row['id_pelanggan'];?>"  data-toggle="modal"class="btn btn-success btn-outline"><i class="bi bi-pencil-square"></i> </a>
                      <a rel="tooltip"  title="Delete" id="<?php echo $row['id_pelanggan'] ?>" href="#delete_pelanggan<?php echo $row['id_pelanggan'];?>"  data-toggle="modal"class="btn btn-danger btn-outline"><i class="bi bi-trash-fill"></i> </a>		
										</td>
                        <?php 
                        require 'edit_pelanggan.php';require 'delete_pelanggan.php';
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
    </section>

  </main><!-- End #main -->

  <?php include ('footer.php');?>
      <?php include ('script.php');?>

</body>

</html>