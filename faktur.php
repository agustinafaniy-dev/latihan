<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak bukti</title>

</head>
<body>
    <h1>toko kue "enak banget" </h1>
    <b><i>jalan merdeka no.3 bekasi timur  </i></b>
    <hr color="red">
    <?php
    $nama = $_GET['nama'];
    $alamat = $_GET['alamat'];
    $kue = $_GET['kue'];
    $jumlah = $_GET['jumlah'];
    switch($kue){
        case 'cake':
            $harga = 20000;
            break;
        case 'brownies':
            $harga = 12000;
            break;
            case"pancake":
                $harga = 15000;
        default:
            $harga = 17000;
    }
    $total = $harga * $jumlah;
    echo"***terimakasih****<br>";
    echo"<p>";
    echo"nama pembeli : $nama<br>";
    echo"alamat       : $alamat<br>";
    echo"========================<br>";
    echo"nama kue    : $kue<br>";
    echo"harga kue   : $harga<br>";
    echo"jumlah beli : $jumlah<br>";
    echo "=========================<br>";
    echo "total bayar  : $total<br>";
    ?>
    </pre>
    <hr color="red">
    <a href="toko kue.php">isi data lagi</a>
    <script>
        window.print();
    </script>
</body>
</html>