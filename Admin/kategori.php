<h3>Data kategori</h3>
<hr>

<?php
$alldata = array();
$take =$conn->query("SELECT * FROM kategori");
while($each =$take->fetch_assoc())
{
    $alldata[]= $each;
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alldata as $key => $value): ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value["nama_kategori"]?></td>
                <td>
                    <a href="" class="btn btn-warning btn-sm">ubah</a>
                    <a href="" class="btn btn-danger btn-sm">hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
    </tbody>
</table>

<a href="" class="btn btn-default">Tambah kategori</a>