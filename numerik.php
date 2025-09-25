<?php
$jumlah=10;
$harga=2000;
$total=$jumlah*$harga;
echo "Jumlah Barang : $jumlah <br>";
echo "Harga Barang : $harga <br>";
echo "Total Harga : Rp " . number_format($total, 0, ',', '.') . " <br>";
echo "<a href=halaman2.php>Klik Disini</a>";

?>