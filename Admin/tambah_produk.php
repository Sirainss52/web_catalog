<?php
$alldata = array();
$take = $conn->query("SELECT * FROM kategori");
while ($each = $take->fetch_assoc()) {
    $alldata[] = $each;
}

if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    // Mendapatkan id_kategori terpilih
    $id_kategori = $_POST['id_kategori'];

    // Mendapatkan nama folder kategori berdasarkan id_kategori terpilih
    $folder_kategori = '';
    foreach ($alldata as $kategori) {
        if ($kategori["id_kategori"] == $id_kategori) {
            $folder_kategori = $kategori["nama_kategori"];
            break;
        }
    }

    // Jika folder kategori belum ada, maka buat folder baru
    if (!empty($folder_kategori) && !is_dir("./foto_produk/$folder_kategori")) {
        mkdir("./foto_produk/$folder_kategori", 0777, true);
    }

    // Memindahkan file foto ke dalam folder kategori yang sesuai
    move_uploaded_file($lokasi, "./foto_produk/$folder_kategori/$nama");

    // Escape input pengguna
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $berat = mysqli_real_escape_string($conn, $_POST['berat']);
    $stok_produk = mysqli_real_escape_string($conn, $_POST['stok_produk']);
    $id_kategori = mysqli_real_escape_string($conn, $_POST['id_kategori']);

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO produk(nama_produk, harga, deskripsi, foto_produk, berat_produk, stok_produk, id_kategori) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sisssii", $nama_produk, $harga, $deskripsi, $nama, $berat, $stok_produk, $id_kategori);

    // Execute statement
    $stmt->execute();

    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=home.php?halaman=produk'>";
}
?>

<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih kategori</option>
            <?php foreach ($alldata as $key => $value): ?>
                <option value="<?php echo $value["id_kategori"]?>"><?php echo $value["nama_kategori"]?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label></label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih kategori</option>
            <option value="">public</option>
            <option value="">hide</option>
        </select>
    </div>
    <div class="form-group">
        <label>Harga (RP)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok_produk">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>