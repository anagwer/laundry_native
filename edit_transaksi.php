
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_transaksi<?php  echo $id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi'] ?>">
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Status Bayar</label>
						<select name="status_bayar" class="form-select">
							<option><?php echo $row['status_bayar'] ?></option>
							<option>Lunas</option>
							<option>Belum Lunas</option>
                        </select>
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Konfirmasi</label>
						<select name="konfirmasi" class="form-select">
							<option><?php echo $row['konfirmasi'] ?></option>
							<option>Proses</option>
							<option>Belum Dikonfirm</option>
							<option>Selesai</option>
                        </select>
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Status Diambil</label>
						<select name="status_ambil" class="form-select">
							<option><?php echo $row['status_ambil'] ?></option>
							<option>Sudah diambil</option>
							<option>Belum diambil</option>
                        </select>
					</div>
					
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Tanggal Ambil</label>
						<input type="date" name="tgl_jemput" value="<?php echo date('Y-m-d', strtotime($row['tgl_jemput']));?>" class="form-control">

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
			$id_transaksi = $_POST['id_transaksi'];
			$status_bayar = $_POST['status_bayar'];
			$konfirmasi = $_POST['konfirmasi'];
			$status_ambil = $_POST['status_ambil'];
			$tgl_jemput = $_POST['tgl_jemput'];
			
			$conn->query("UPDATE transaksi SET status_bayar = '$status_bayar',konfirmasi = '$konfirmasi',status_ambil = '$status_ambil',tgl_jemput = '$tgl_jemput' WHERE id_transaksi = '$id_transaksi'")or die(mysql_error());
			echo "<script> window.location='transaksi.php' </script>";
			
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
					<input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi'] ?>">
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
			$id_transaksi = $_POST['id_transaksi'];
			$jenis_layanan = $_POST['jenis_layanan'];
			$estimasi_waktu = $_POST['estimasi_waktu'];
			$tarif = $_POST['tarif'];
			
			$conn->query("UPDATE jenis_layanan SET jenis_layanan = '$jenis_layanan',estimasi_waktu = '$estimasi_waktu', tarif = '$tarif' WHERE id_jenis_layanan = '$id_jenis_layanan'")or die(mysql_error());
			echo "<script> window.location='jenis_layanan.php?id_transaksi=$id_transaksi&nama_layanan=$nama_layanan' </script>";
			
		}	
	?>
								
<?php
	}
?>