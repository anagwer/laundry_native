
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_pelanggan<?php  echo $id_pelanggan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_pelanggan" value="<?php echo $row['id_pelanggan'] ?>">
					<div class="col-12">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
                    <label for="inputNanme4" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" required>
                    </div>
                    <div class="col-12">
                    <label for="inputNanme4" class="form-label">No Telp (Whatsapp)</label>
                    <input type="text" class="form-control" name="no_telp" value="<?php echo $row['no_telp'] ?>" required>
                    </div>
                    <div class="col-12">
                    <label for="inputNanme4" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>" required>
                    </div>
                    <div class="col-12">
                    <label for="inputNanme4" class="form-label">Jenis Kelamin</label>
                    <select name="jns_kelamin" class="form-select">
                        <option><?php echo $row['jns_kelamin'] ?></option>
                        <option>Perempuan</option>
					    <option>Laki-laki</option>
                        </select>
                    </div>
                    <br>
						<button name = "update" type="submit" class="btn btn-primary">Simpan</button>
					</form>
			</div>
            <div class="modal-footer">
                 <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
                               
	<?php 
		require 'dbcon.php';
		
		if(ISSET($_POST['update'])){
			$bool = true;
			$id_user=$_POST['id_user'];
            $nama=$_POST['nama'];
            $no_telp=$_POST['no_telp'];
            $alamat=$_POST['alamat'];
            $jns_kelamin=$_POST['jns_kelamin'];
            
            $conn->query("UPDATE pelanggan SET id_user = '$id_user',nama = '$nama',no_telp = '$no_telp',alamat = '$alamat',jns_kelamin = '$jns_kelamin' WHERE id_pelanggan = '$id_pelanggan'")or die(mysql_error());
            echo "<script> window.location='pelanggan.php' </script>";
                
		}	
	?>
								
<?php
	}
?>