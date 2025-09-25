<?php
include 'koneksi.php';

$query = "SELECT produk.nama_produk, produk.harga, produk.gambar, kategori.nama_kategori FROM produk JOIN kategori ON produk.kategori_id = kategori.id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Daftar Produk</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
        echo "<h3>" . $row['nama_produk'] . "</h3>";
        if (!empty($row['gambar'])) {
            echo "<img src='" . $row['gambar'] . "' alt='Gambar Produk' style='max-width: 200px;'><br>";
        }
        echo "<p><strong>Harga:</strong> Rp " . number_format($row['harga'], 0, ',', '.') . "</p>";
        echo "<p><strong>Kategori:</strong> " . $row['nama_kategori'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Tidak ada produk ditemukan.";
}

mysqli_close($conn);
?>
