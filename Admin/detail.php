<h2>Detail Pembelian</h2>
<?php
$take = $conn->query("SELECT * FROM pesanan JOIN pembeli 
on pesanan.id_pembeli = pembeli.id_pembeli 
WHERE pesanan.id_pembeli= '$_GET[id]'");
$detail = $take->fetch_assoc();
?>
<pre><?php print_r($detail);?></pre>