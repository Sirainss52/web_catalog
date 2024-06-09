<h2>Data Produk</h2>
<a href="home.php?halaman=tambah_produk" class="btn btn-primary">Tambah produk</a>
<table class="table table-bordered" border="1">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>stok</th>
            <th>kategori</th>
            <th>foto</th>
            <th>berat</th>
            <th>deskripsi</th>
            <th>Status</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1?>
        <?php $take=$conn->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");?>
        <?php while($pecah = $take->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga'];?></td>
            <td><?php echo $pecah['stok_produk'];?></td>
            <td><?php echo $pecah['nama_kategori'];?></td>
            <td>
            <img src="./foto_produk/<?php echo htmlspecialchars($pecah['nama_kategori'] . '/' . $pecah['foto_produk']); ?>" width="100">
           </td>
           <td><?php echo $pecah['berat_produk'];?>gr</td>
           <td><?php echo $pecah['deskripsi'];?></td>
           <td><?php echo $pecah['status'];?></td>
            <td>
                <a href="home.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger">hapus</a>
                <a href="home.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">ubah</a>
            </td>
            
        </tr>
    </tbody>
        <?php $nomor++; ?>
        <?php } ?>
</table>