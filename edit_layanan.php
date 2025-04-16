
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_kategori_layanan<?php  echo $id_kategori_layanan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_kategori_layanan" value="<?php echo $row['id_kategori_layanan'] ?>">
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama_layanan" value="<?php echo $row['nama_layanan'] ?>">
					</div>
					<br>
						<button name = "update1" type="submit" class="btn btn-primary">Simpan</button>
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
		
		if(ISSET($_POST['update1'])){
			$id_kategori_layanan = $_POST['id_kategori_layanan'];
			$nama_layanan = $_POST['nama_layanan'];
			
			$conn->query("UPDATE kategori_layanan SET nama_layanan = '$nama_layanan' WHERE id_kategori_layanan = '$id_kategori_layanan'")or die(mysql_error());
			echo "<script> window.location='layanan.php' </script>";
			
		}	
	?>
								
<?php
	}
?>


<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_jenis_layanan<?php  echo $id_jenis_layanan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_jenis_layanan" value="<?php echo $row['id_jenis_layanan'] ?>">
					<input type="hidden" name="id_kategori_layanan" value="<?php echo $row['id_kategori_layanan'] ?>">
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Jenis Layanan</label>
						<input type="text" class="form-control" name="jenis_layanan" value="<?php echo $row['jenis_layanan'] ?>">
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Estimasi (hari)</label>
						<input type="text" class="form-control" name="estimasi_waktu" value="<?php echo $row['estimasi_waktu'] ?>">
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Tarif (Rp.)</label>
						<input type="text" class="form-control" name="tarif" value="<?php echo $row['tarif'] ?>">
					</div>
					<br>
						<button name = "update2" type="submit" class="btn btn-primary">Simpan</button>
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
		
		if(ISSET($_POST['update2'])){
			$id_jenis_layanan = $_POST['id_jenis_layanan'];
			$id_kategori_layanan = $_POST['id_kategori_layanan'];
			$jenis_layanan = $_POST['jenis_layanan'];
			$estimasi_waktu = $_POST['estimasi_waktu'];
			$tarif = $_POST['tarif'];
			
			$conn->query("UPDATE jenis_layanan SET jenis_layanan = '$jenis_layanan',estimasi_waktu = '$estimasi_waktu', tarif = '$tarif' WHERE id_jenis_layanan = '$id_jenis_layanan'")or die(mysql_error());
			echo "<script> window.location='jenis_layanan.php?id_kategori_layanan=$id_kategori_layanan&nama_layanan=$nama_layanan' </script>";
			
		}	
	?>
								
<?php
	}
?>