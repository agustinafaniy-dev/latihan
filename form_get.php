<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form get_browser</title>
</head>
<body>
    <h1>form methode GET</h1>
    <form action="" method="get" enctype="multipart/form-data">
    <input type="text" name="teks" id="teks" value="" placeholder="nama" required><br>
    <input type="submit" name="kirim" value="kirim">
    </form>
    <?php
    if (isset($_GET['kirim'])) {
        $nama = @$_GET['teks'];
        echo "nama anda adalah : <b>$nama</b>";
    }
    ?>
</body>
</html>