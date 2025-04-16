<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISTEM INFORMASI LAUNDRY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            
            <div class="col-lg-6">
              <div class="card">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Daftar Akun</h5>
                  </div>
                  <form class="row g-3 needs-validation" method="POST" enctype = "multipart/form-data">

                  <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="nama" required>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Foto</label>
                    <input type="file" name="image"  class="form-control" required/>
                  </div>
                  <div class="col-12">
                  <label for="inputNanme4" class="form-label">No Telp (Whatsapp)</label>
                  <input type="text" class="form-control" name="no_telp" required>
                </div>
                <div class="col-12">
                          <label for="inputNanme4" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" required>
                        </div>
                <div class="col-12">
                          <label for="inputNanme4" class="form-label">Jenis Kelamin</label>
                          <select name="jns_kelamin" class="form-select">
                  <option>Perempuan</option>
                  <option>Laki-laki</option>
                  </select>
                        </div>
                  <div class="col-12">
                      Sudah punya akun? <a href="login.php">Login</a>
                    </div>
                  <br>
                    <button name = "save" type="submit" class="btn btn-primary">Simpan</button>
                  </form>  

                </div>
              </div>

            </div>
          </div>
        </div>
        <?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
					$username=$_POST['username'];
					$password=md5($_POST['password']);
					if (in_array($_FILES['image']['type'], ['image/jpeg', 'image/jpg', 'image/webp', 'image/png'])) {
					$image_name = addslashes($_FILES['image']['name']);
            $image_size = $_FILES['image']['size'];
            
          $upload_dir = "upload/profil/"; 
          move_uploaded_file($_FILES["image"]["tmp_name"],"upload/profil/" . $_FILES["image"]["name"]);
          $target_file = $upload_dir . basename($image_name);
					$image_location = $image_name;
					
					$conn->query("INSERT INTO user values(null,'$username','$password','Pelanggan','$image_location')")or die(mysql_error());
          $nama=$_POST['nama'];
					$no_telp=$_POST['no_telp'];
					$alamat=$_POST['alamat'];
					$jns_kelamin=$_POST['jns_kelamin'];

          $query1 = $conn->query("SELECT MAX(id_user) as id FROM user");
          $row1 = $query1->fetch_array();
					$id_user = $row1['id'];
					$conn->query("INSERT INTO pelanggan values(null,'$id_user','$nama','$no_telp','$alamat','$jns_kelamin')")or die(mysql_error());
          echo "<script>alert('Akun berhasil terdaftar. Silahkan Login');</script>";
          echo "<script> window.location='login.php' </script>";
					} else {
						echo "<script>alert('Hanya file dengan ekstensi jpg, jpeg, webp, atau png yang diizinkan.');</script>";
					}
				}						
			?>		
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>