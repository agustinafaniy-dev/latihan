<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko kue enak banget</title>
</head>
<body>
    <center>
    <h1>toko kue "enak banget"</h1>
    <b><i>jalan merdeka no.3 bekasi timur</i></b>
    <hr color="red">    
    <form action="faktur.php" method="get">
        <pre>
            nama pembeli : <input type="text" name="nama" id="" required><br>
            alamat       : <input type="text" name="alamat" id="" required><br>
            kue          : <select name="kue" id="">
                            <option value="cake">cake</option>
                            <option value="brownies">brownies</option>
                            <option value="pancake">pancake</option>
                            <option value="donat">donat</option>
                           </select><br>
        </pre>
        jumlah beli  : <input type="number" name="jumlah" id="" required><br>
        <input type="submit" value="kirim" name="kirim ">
        <input type="reset" value="batal">
        <hr color="red">
    </center>
</body>
</html>