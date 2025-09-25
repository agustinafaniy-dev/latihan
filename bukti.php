<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faktur apotik</title>
</head>
<body>
    <center>
        <hr color="red">
        <h1>FAKTUR PEMBELIAN OBAT</h1>
        <b><i>jalan sehat selalu no.1, bekasi kota</i></b>
        <hr color="red">
        <pre>
            <?php
        $nama = @$_GET['nama'];
        $alamat = @$_GET['alamat'];
        $kode = @$_GET['kode'];
        $jumlah = @$_GET['jumlah'];
        if ($kode  == 'A001') {
            $nama_obat = "Paracetamol";
            $harga = 3000;
        } elseif ($kode == 'A002') {
            $nama_obat = "Bodrex";
            $harga = 4000;
        } elseif ($kode == 'A003') {
            $nama_obat = "Antimo";
            $harga = 5000;
        } elseif ($kode == 'A004') {
            $nama_obat = "Promag";
            $harga = 6000;
        } elseif ($kode == 'A005') {
            $nama_obat = "Mixagrip";
            $harga = 7000;
        } else {
            $nama_obat = "Kode obat tidak ditemukan";
            $harga = 0;
        }
        $total = $harga * $jumlah;
        echo"***terimakasih****<br>";
        echo"<p>";
        echo"nama pasien : $nama<br>";
        echo"alamat      : $alamat<br>";
        echo"harga obat  : $harga<br>";
        echo"jumlah beli : $jumlah<br>";
        echo"nama obat   : $nama_obat<br>";
        echo"total bayar : $total<br>";
        ?>


</pre>
<hr color="red">
<a href="apotik.php">isi data lagi</a>
</center>
<script>
    window.print();
</script>
</body>
</html>