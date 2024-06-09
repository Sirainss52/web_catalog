<h2>Data Pesanan</h2>

<table class="table table-bordered" border="1">
    <thead>
        <tr>
            <th>no</th>
            <th>nama pembeli</th>
            <th>tanggal</th>
            <th>total</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1?>
        <?php $take=$conn->query("SELECT * FROM pesanan JOIN pembeli ON pesanan.id_pembeli = pembeli.id_pembeli JOIN produk ON pesanan.id_produk = produk.id_produk");?>
        <?php while($pecah = $take->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_pembeli'];?></td>   
            <td><?php echo $pecah['tgl_pesanan'];?></td>
            <td><?php echo $pecah['total_pesanan'];?></td>
            <td>
                <a href="home.php?halaman=detail&id=<?php echo $pecah['id_pesanan']?>" class="btn btn-info">detail</a>
            </td>
        </tr>
        
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>