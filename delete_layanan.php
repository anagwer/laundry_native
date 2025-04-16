<?php
	if(!$bool){
?>
<div class="modal fade" id="delete_jenis_layanan<?php echo $id_jenis_layanan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<h5 class="modal-title">Hapus</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
																
			<div class="modal-body">
				Apa Kamu yakin akan menghapus jenis_layanan?
			</div>
									
			<div class="modal-footer">
				<form method = "post" enctype = "multipart/form-data">	
				<input type="hidden" name="id_jenis_layanan" value="<?php echo $row['id_jenis_layanan'] ?>">
				<button name = "delete" type="submit" class="btn btn-danger">Yes</button>
				</form>
				<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
			</div>
		</div>
			
<!-- /.modal-content -->

	</div>
		
<!-- /.modal-dialog -->
	
</div>
<?php
	require_once 'dbcon.php';
	if(ISSET($_POST['delete'])){
		$id_jenis_layanan=$_POST['id_jenis_layanan'];
		$conn->query("delete from jenis_layanan where id_jenis_layanan='$id_jenis_layanan'") or die(mysql_error());
		echo "<script> window.location='jenis_layanan.php?id_kategori_layanan=$id_kategori_layanan&nama_layanan=$nama_layanan' </script>";
	}
}
?>

<?php
	if(!$bool){
?>
<div class="modal fade" id="delete_kategori_layanan<?php echo $id_kategori_layanan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<h5 class="modal-title">Hapus</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
																
			<div class="modal-body">
				Apa Kamu yakin akan menghapus kategori_layanan?
			</div>
									
			<div class="modal-footer">
				<form method = "post" enctype = "multipart/form-data">	
				<input type="hidden" name="id_kategori_layanan" value="<?php echo $row['id_kategori_layanan'] ?>">
				<button name = "delete1" type="submit" class="btn btn-danger">Yes</button>
				</form>
				<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
			</div>
		</div>
			
<!-- /.modal-content -->

	</div>
		
<!-- /.modal-dialog -->
	
</div>
<?php
	require_once 'dbcon.php';
	if(ISSET($_POST['delete1'])){
		$id_kategori_layanan=$_POST['id_kategori_layanan'];
		$conn->query("delete from jenis_layanan where id_kategori_layanan='$id_kategori_layanan'") or die(mysql_error());
		$conn->query("delete from kategori_layanan where id_kategori_layanan='$id_kategori_layanan'") or die(mysql_error());
		echo "<script> window.location='layanan.php' </script>";
	}
}
?>