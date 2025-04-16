<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
				<div class="col-12">
				<input type="hidden" name="id_user" value="<?php echo $_SESSION['ID'] ?>">
                  <label for="inputNanme4" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" required>
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
				<br>
					<button name = "save" type="submit" class="btn btn-primary">Simpan</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
            </div>
										
												
			<?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
					$id_user=$_POST['id_user'];
					$nama=$_POST['nama'];
					$no_telp=$_POST['no_telp'];
					$alamat=$_POST['alamat'];
					$jns_kelamin=$_POST['jns_kelamin'];
					
					$conn->query("INSERT INTO pelanggan values(null,'$id_user','$nama','$no_telp','$alamat','$jns_kelamin')")or die(mysql_error());
					
				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>
