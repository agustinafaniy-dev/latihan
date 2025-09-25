<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>masukan data</title>
</head>
<body>
    <h1>masukan identitas anda</h1>
    <form action="" method="post" enctype="multipart/form-data">
         nama : <input type="text" name="nama" id="" ><br>
         telepon : <input type="text" name="telp" id="" ><br>
            alamat : <input type="text" name="alamat" id="" ><br>
        <input type="submit" value="kirim" name="kirim">
        <input type="reset" value="batal">
    </form>
    <?php
    if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
       if($nama=="" ){
        echo "nama tidak boleh kosong<br>";
       } 
       if($telp=="" ){
        echo "telepon tidak boleh kosong <br>";
       }
         if($alamat=="" ){
          echo "alamat tidak boleh kosong <br>";
         }
            if($nama!="" && $telp!="" && $alamat!=""){
                echo "nama anda adalah : <b>$nama</b><br>";
                echo "telepon anda adalah : <b>$telp</b><br>";
                echo "alamat anda adalah : <b>$alamat</b><br>";
            }
    }
    ?>
</body>
</html>