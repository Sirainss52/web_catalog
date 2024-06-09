<!-- DB produk -->
<h2>Ubah Produk</h2>
<?php
$take = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $take->fetch_assoc();
?>
<!-- DB kategori -->
<?php
$alldata = array();
$take = $conn->query("SELECT * FROM kategori");
while ($each = $take->fetch_assoc()) {
    $alldata[] = $each;
}
?>
<!-- Form untuk ubah/edit produk -->
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($pecah['nama_produk']); ?>">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih kategori</option>
            <?php foreach ($alldata as $key => $value): ?>
                <option value="<?php echo htmlspecialchars($value["id_kategori"]) ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){ echo "selected"; } ?>>
                <?php echo htmlspecialchars($value["nama_kategori"]) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga (RP)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo htmlspecialchars($pecah['harga']); ?>">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo htmlspecialchars($pecah['berat_produk']); ?>">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" value="<?php echo htmlspecialchars($pecah['stok_produk']); ?>">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"><?php echo htmlspecialchars($pecah['deskripsi']) ?></textarea>
    </div>
    <div class="form-group">
        <?php
        $kategori_id = $pecah['id_kategori'];
        $kategori_query = $conn->query("SELECT nama_kategori FROM kategori WHERE id_kategori='$kategori_id'");
        $kategori = $kategori_query->fetch_assoc();
        $nama_kategori = htmlspecialchars($kategori['nama_kategori']);
        ?>
        <img src="./foto_produk/<?php echo str_replace(' ', '_', $nama_kategori); ?>/<?php echo htmlspecialchars($pecah['foto_produk']); ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    // Jika foto diganti
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "./foto_produk/" . htmlspecialchars($namafoto));

        $conn->query("UPDATE produk SET nama_produk='" . htmlspecialchars($_POST['nama']) . "',
            harga='" . htmlspecialchars($_POST['harga']) . "', berat_produk='" . htmlspecialchars($_POST['berat']) . "', stok_produk='" . htmlspecialchars($_POST['stok']) . "', foto_produk='$namafoto', deskripsi='" . htmlspecialchars($_POST['deskripsi']) . "', id_kategori='" . htmlspecialchars($_POST['id_kategori']) . "'
            WHERE id_produk='$_GET[id]'");
    } else {
        $conn->query("UPDATE produk SET nama_produk='" . htmlspecialchars($_POST['nama']) . "',
            harga='" . htmlspecialchars($_POST['harga']) . "', berat_produk='" . htmlspecialchars($_POST['berat']) . "', stok_produk='" . htmlspecialchars($_POST['stok']) . "', deskripsi='" . htmlspecialchars($_POST['deskripsi']) . "', id_kategori='" . htmlspecialchars($_POST['id_kategori']) . "'
            WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data produk telah diubah');</script>";
    echo "<script>location='home.php?halaman=produk';</script>";
}
?>