<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apotik fani</title>
</head>
<body>
    <form action="bukti.php" method="get">
        <center>

            <h1>APOTIK FANI</h1>
            <b><i>jalan sehat selalu no.1, bekasi kota</i></b>
            <hr color="red">
        </center>
        <center>

            <pre>
                nama pasien: <input type="text" name="nama" id="" required><br>
                alamat     : <input type="text" name="alamat" id="" required><br
                ></pre>
                kode obat : <select name="kode" id="">
                    <option value="A001">A001</option>
                    <option value="A002">A002</option>
                    <option value="A003">A003</option>
                    <option value="A004">A004</option>
                    <option value="A005">A005</option>
                </select><br>
                
                <hr color="red">
                jumlah beli : <input type="number" name="jumlah" id="" required><br>
                <input type="submit" value="kirim" name="kirim">
                <input type="reset" value="batal">
                <hr color="red  ">
            </center>
            </form>
</body>
</html>