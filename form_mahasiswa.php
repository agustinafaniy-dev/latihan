<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input mahasiswa</title>
</head>
<body>
    <form action="tampil_mahasiswa.php" method="post">
        <b>pengelolaan data mahasiswa</b><br>
        <pre>
nama      : <input type="text" name="nama" id="" required><br>
alamat:   : <input type="text" name="alamat" id="" required><br>
</pre>
jenis kelamin : <input type="radio" name="jk" id="" value="pria" required> pria
              <input type="radio" name="jk" id="" value="wanita" required> wanita<br>
              <p>

                  pekerjaan : <select name="pekerjaan" id="">
                      <option value="pelajar">pelajar</option>
                      <option value="mahasiswa">mahasiswa</option>
                      <option value="karyawan">karyawan</option>
                      <option value="wiraswasta">wiraswasta</option>
                      <option value="lainnya">lainnya</option>
                    </select><br>
                </p>
                <p>

                    hobi      : <input type="checkbox" name="hobi[]" id="" value="membaca"> membaca
                    <input type="checkbox" name="hobi[]" id="" value="menulis"> menulis
                    <input type="checkbox" name="hobi[]" id="" value="traveling"> traveling
                </p>
<input type="submit" value="kirim" name="kirim ">
<input type="reset" value="batal">
    </form>
</body>
</html>