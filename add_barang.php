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
                  <label for="inputNanme4" class="form-label">Pilih Barang</label>
                  <select name="nm_barang" id="nm_barang" class="form-select"> 
					<option value="0">-- Pilih barang -- </option> 
					<?php   
					
					require 'dbcon.php'; 
					$result = mysqli_query($con, "select * from barang");  
					while ($row = mysqli_fetch_array($result)) {  
						echo '<option value="'.$row['nm_barang'] . '">' . $row['nm_barang'] .' | Stok: '. $row['sisa_stok'].'</option>';   
					}  
					?>   
				</select>
                </div><hr>
				<div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Barang (Jika Belum ada)</label>
                  <input type="text" class="form-control" name="nm_barang1">
                </div>
				<div class="col-12">
                  <label for="inputNanme4" class="form-label">Pilih Stok Masuk/Keluar</label>
                  <select name="pilih" class="form-select">
					<option>Masuk</option>
					<option>Keluar</option>
					</select>
                </div>
				<div class="col-12">
                  <label for="inputNanme4" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" name="tgl" requred>
                </div>
				<div class="col-12">
                  <label for="inputNanme4" class="form-label">Stok Masuk/Keluar</label>
                  <input type="number" class="form-control" name="stok">
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
					$nm_barang=$_POST['nm_barang'];
					$nm_barang1=$_POST['nm_barang1'];
					$pilih=$_POST['pilih'];
					$tgl=$_POST['tgl'];
					$stok=$_POST['stok'];
					if($nm_barang=='0'){
						if($pilih=="Masuk"){
							$conn->query("INSERT INTO barang values(null,'$id_user','$nm_barang1','$tgl','$stok','0000-00-00','0','$stok')")or die(mysql_error());
						}else{
							echo "<script>alert('Barang belum ada jadi tidak bisa dikurangi');</script>";
						}
					
					}else{
					$query1 = $conn->query("SELECT * FROM barang where nm_barang='$nm_barang' order by id_barang DESC");
					$row1 = $query1->fetch_array();

					if($pilih=="Masuk"){
						$sisa_stok=$stok + $row1['sisa_stok'];
						$conn->query("INSERT INTO barang values(null,'$id_user','$nm_barang','$tgl','$stok','0000-00-00','0','$sisa_stok')")or die(mysql_error());
					}else{
						$sisa_stok=$row1['sisa_stok']-$stok;
						if($sisa_stok>0){
							$conn->query("INSERT INTO barang values(null,'$id_user','$nm_barang','0000-00-00','0','$tgl','$stok','$sisa_stok')")or die(mysql_error());
						}else{
							echo "<script>alert('Stok kurang. Jadi tidak bisa dikurangi');</script>";
						}
						
					}
					}
				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>
