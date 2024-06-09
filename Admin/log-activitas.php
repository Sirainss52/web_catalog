<h2>Log activity</h2>
<table class="table table-bordered" border="1"> 
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1?>
        <?php $take=$conn->query("SELECT * FROM produk");?>
        <?php while($pecah = $take->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['id_produk'];?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga'];?></td>
            <td>shirt.jpg</td>
            <td>
                <a href="" class="btn btn-danger"> hapus</a>
                <a href="" class="btn btn-warning">ubah</a>
            </td>
        <?php } ?>
        </tr>
    </tbody>