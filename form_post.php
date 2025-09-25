<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form method post</title>
</head>
<body>
  
    <h1>form methode POST</h1>
    <form action="" method="post" enctype="multipart/form-data">
        masukan nama:<input type="text" name="nama"  placeholder="nama" required><br>
        <input type="submit" value="kirim" name="kirim">
    </form>
    <?php
    if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        echo "nama anda adalah : <b>$nama</b>";
    }
    ?>
</body>
</html>