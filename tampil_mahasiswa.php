<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mahasiswa</title>
</head>
<body>
    <h1>data mahasiswa</h1>
    <?php
  
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];
        $pekerjaan = $_POST['pekerjaan'];
        $hobi = @$_POST['hobi'];

    
    ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td colspan="3"><b>data mahasiswa</b></td>
        </tr>
        <tr>
            <td>nama</td>
            <td>:</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>alamat</td>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>jenis kelamin</td>
            <td>:</td>
            <td><?php echo $jk; ?></td>
        </tr>
        <tr>
            <td>pekerjaan</td>
            <td>:</td>
            <td><?php echo $pekerjaan; ?></td>
        </tr>
        <tr>
            <td>hobi</td>
            <td>:</td>
            <td><?php 
            if (!empty($hobi)) {
                foreach ($hobi as $h) {
                    echo "-$h<br>";
                }
            } else {
                echo "tidak ada hobi";
            }
             ?></td>
        </tr>
    </table>
</body>
</html>