<div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">    
                    <div class="col-12">
						<label for="inputNanme4" class="form-label">Nama Layanan</label>
						<input type="text" class="form-control" name="nama_layanan">
					</div>
                      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button name="save1" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
require_once 'dbcon.php';

if (isset($_POST['save1'])) {

    $nama_layanan = $_POST['nama_layanan'];

    $query1 = $conn->query("SELECT COUNT(*) as jml FROM kategori_layanan where nama_layanan='$nama_layanan'");
    $row1 = $query1->fetch_array();
    if($row1['jml']==0){
        $conn->query("INSERT INTO kategori_layanan VALUES (NULL, '$nama_layanan');");
        echo "<script>window.location.href='layanan.php';</script>";
    }else{
        echo "<script>alert('Nama Kategori Sudah Ada');</script>";
        echo "<script>window.location.href='layanan.php';</script>";
    }

    }
?>
<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">    
                    <input type="text" name="nama_layanan" value="<?php echo $nama_layanan; ?>">
                    <input type="text" name="id_kategori_layanan" value="<?php echo $id_kategori_layanan; ?>">
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Jenis Layanan</label>
						<input type="text" class="form-control" name="jenis_layanan">
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Estimasi (hari)</label>
						<input type="text" class="form-control" name="estimasi_waktu">
					</div>
					<div class="col-12">
						<label for="inputNanme4" class="form-label">Tarif (Rp.)</label>
						<input type="text" class="form-control" name="tarif">
					</div>
                      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button name="save2" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
require_once 'dbcon.php';

if (isset($_POST['save2'])) {

    $nama_layanan = $_POST['nama_layanan'];
    $id_kategori_layanan = $_POST['id_kategori_layanan'];
    $jenis_layanan = $_POST['jenis_layanan'];
    $estimasi_waktu = $_POST['estimasi_waktu'];
    $tarif = $_POST['tarif'];

    $query1 = $conn->query("SELECT COUNT(*) as jml FROM jenis_layanan where jenis_layanan='$jenis_layanan'");
    $row1 = $query1->fetch_array();
    if($row1['jml']==0){
        $conn->query("INSERT INTO jenis_layanan VALUES (NULL, '$id_kategori_layanan', '$jenis_layanan', '$estimasi_waktu', '$tarif');");
        echo "<script>window.location.href='jenis_layanan.php?id_kategori_layanan=$id_kategori_layanan&nama_layanan=$nama_layanan';</script>";
    }else{
        echo "<script>alert('Nama Jenis Kategori Sudah Ada');</script>";
        echo "<script>window.location.href='jenis_layanan.php?id_kategori_layanan=$id_kategori_layanan&nama_layanan=$nama_layanan';</script>";
    }

    }
?>
