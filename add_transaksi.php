<style>
	input[readonly], textarea[readonly], select[readonly] {
    background-color: #e9ecef; /* Warna abu-abu terang */
    color: #6c757d; /* Warna teks yang lebih gelap */
    border-color: #ccc; /* Warna border */
}
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['ID'] ?>">
                                <label for="inputNanme4" class="form-label">Nama Pelanggan</label>
								<?php if($_SESSION['ROLE']!='Admin'){?>
									<input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $_SESSION['ID'];?>" required>
									<input type="text" readonly class="form-control" name="nama" value="<?php echo $_SESSION['USERNAME'].' | no telp: '.$_SESSION['NO_TELP'].' | alamat: '.$_SESSION['ALAMAT'];?>" required>
								<?php }else{?>
								
                                <select name="id_pelanggan" id="id_pelanggan" class="form-select">
                                    <?php
                                    $id_user = $_SESSION['ID'];
                                    $query1 = $conn->query("SELECT * FROM pelanggan");
                                    $row1 = $query1->fetch_array();
                                    ?>
                                    <option value=<?php echo $row1['id_pelanggan'];?>>
                                        <?php echo $row1['nama'].' | '.$row1['no_telp'].' | Alamat: '. $row1['alamat'];?>
                                    </option>
                                    <?php
                                    require 'dbcon.php';
                                    $result = mysqli_query($con, "select * from pelanggan");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id_pelanggan'].'">' . $row['nama'] .' | '. $row['no_telp'].' | '. $row['alamat'].'</option>';
                                    }
                                    ?>
                                </select>
							<?php }?>
                            </div>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Jenis Layanan</label>
                                <select name="jenis_layanan" id="jenis_layanan" class="form-select">
                                    <option selected disabled value>-- Pilih Layanan --</option>
                                    <?php
                                    require 'dbcon.php';
                                    $result = mysqli_query($con, "select jenis_layanan.*, kategori_layanan.* from kategori_layanan join jenis_layanan on kategori_layanan.id_kategori_layanan=jenis_layanan.id_kategori_layanan");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id_jenis_layanan'].'|'.$row['tarif'].'|'.$row['estimasi_waktu'].'">' . $row['nama_layanan'] .' | '. $row['jenis_layanan'].' | Rp. '. $row['tarif'].' | '. $row['estimasi_waktu'].' Hari </option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Apakah Antar Jemput?</label><br>
                                <input type="radio" name="antar" value="Ya" />
                                <label for="Ya">Ya</label>
                                <input type="radio" name="antar" value="Tidak" />
                                <label for="Tidak">Tidak</label>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="inputNanme4" class="form-label">Estimasi (Hari)</label><br>
                                        <input type="number" class="form-control" name="estimasi" id="estimasi" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="inputNanme4" class="form-label">Tarif (/KG)</label><br>
                                        <input type="number" class="form-control" name="tarif" id="tarif" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="inputNanme4" class="form-label">Berat (Kg)</label><br>
                                        <input type="number" class="form-control" name="berat" id="berat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Alamat</label><br>
                                <textarea name="alamat" id="alamat" class="form-control" readonly></textarea>
                            </div>
                            <div class="col-6"><br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputNanme4" class="form-label">Pilih Metode Bayar</label><br>
                                        <select name="metode_bayar" id="metode_bayar" class="form-select">
                                            <option selected disabled value>-- Pilih Metode Bayar --</option>
                                            <option>Cash</option>
                                            <option>Transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="inputNanme4" id="norek" class="form-label text-danger" style="display:none;"><b>70891234 <br>(BCI a/n Budi)</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 text-center">
                                <h3>Total Pembayaran</h3>
                                <h1><b><span id="total"></span></b></h1>
                            </div>
                            <div class="col-6" id="bukti" style="display:none;">
                                <label for="inputNanme4" class="form-label">Bukti TF</label><br>
                                <input type="file" name="bukti" class="form-control">
                            </div>
                        </div>
                    </div><br>
                    <button name="save" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?php
            require_once 'dbcon.php';

            if (isset($_POST['save'])) {
                $id_user = $_POST['id_user'];
                $id_pelanggan = $_POST['id_pelanggan'];
                $id_jenis_layanan = $_POST['jenis_layanan'];
                $metode_bayar = $_POST['metode_bayar'];
                $status_bayar = $_POST['metode_bayar'] == 'Cash' ? 'Lunas' : 'Belum Lunas';
                $konfirmasi = $_POST['metode_bayar'] == 'Cash' ? 'Ya' : 'Belum Dikonfirm';
                $status_ambil = 'Belum Diambil';
                $antar_jemput = $_POST['antar'];
                $alamat_antar = $_POST['alamat_antar'];
                $berat = $_POST['berat'];
                $tarif = $_POST['tarif'];
                $estimasi = $_POST['estimasi'];
				// Set tgl_transaksi ke waktu saat ini
				$tgl_transaksi = date('Y-m-d H:i:s');
				// Hitung tgl_selesai
				$tgl_selesai = date('Y-m-d H:i:s', strtotime("$tgl_transaksi + $estimasi days"));
                $total = $berat * $tarif;

                $bukti = null;
                if ($_POST['metode_bayar'] == 'Transfer' && isset($_FILES['bukti']['name'])) {
                    $bukti_name = $_FILES['bukti']['name'];
                    $bukti = "upload/bukti/" . basename($_FILES['bukti']['name']);
                    move_uploaded_file($_FILES['bukti']['tmp_name'], $bukti);
                }

                $query = "INSERT INTO transaksi (id_user, id_pelanggan, id_jenis_layanan, status_bayar, status_ambil, tgl_transaksi, tgl_selesai, antar_jemput, alamat_antar, berat, total, metode_bayar, konfirmasi, bukti)
                        VALUES ('$id_user', '$id_pelanggan', '$id_jenis_layanan', '$status_bayar', '$status_ambil', '$tgl_transaksi', '$tgl_selesai', '$antar_jemput', '$alamat_antar', '$berat', '$total', '$metode_bayar', '$konfirmasi', '$bukti_name')";

                if ($conn->query($query)) {
                    echo "<script>alert('Transaksi berhasil disimpan!');</script>";
                } else {
                    echo "<script>alert('Gagal menyimpan transaksi: " . $conn->error . "');</script>";
                }
            }
            ?>

            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    // Populate estimasi and tarif based on jenis layanan
                    document.querySelector('select[name="jenis_layanan"]').addEventListener('change', function () {
                        const selectedOption = this.options[this.selectedIndex];
                        const [id, tarif, estimasi] = selectedOption.value.split('|');
                        document.getElementById('tarif').value = tarif || '';
                        document.getElementById('estimasi').value = estimasi || '';
                    });

                    // Handle antar jemput logic
                    document.querySelectorAll('input[name="antar"]').forEach(function (radio) {
                        radio.addEventListener('change', function () {
                            if (this.value === 'Tidak') {
                                document.getElementById('alamat').setAttribute('readonly', true);
                            } else {
                                document.getElementById('alamat').removeAttribute('readonly');
                            }
                        });
                    });

                    // Handle metode bayar logic
                    const metodeBayar = document.getElementById('metode_bayar');
                    const norekLabel = document.getElementById('norek');
                    const buktiDiv = document.getElementById('bukti');

                    metodeBayar.addEventListener('change', function () {
                        if (this.value === 'Transfer') {
                            norekLabel.style.display = 'block';
                            buktiDiv.style.display = 'block';
                        } else {
                            norekLabel.style.display = 'none';
                            buktiDiv.style.display = 'none';
                        }
                    });

                    // Calculate total
                    const beratInput = document.getElementById('berat');
                    const tarifInput = document.getElementById('tarif');
                    const totalSpan = document.getElementById('total');

                    [beratInput, tarifInput].forEach(function (input) {
                        input.addEventListener('input', function () {
                            const berat = parseFloat(beratInput.value) || 0;
                            const tarif = parseFloat(tarifInput.value) || 0;
                            const total = berat * tarif;
                            totalSpan.textContent = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>
