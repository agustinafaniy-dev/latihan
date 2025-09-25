<?php
// Contoh penggunaan if dengan kondisi OR (||)

$umur = 16;
$punyaIzinOrangTua = true;

if ($umur >= 18 || $punyaIzinOrangTua) {
    echo "Anda boleh mengikuti acara ini.<br>";
} else {
    echo "Anda tidak boleh mengikuti acara ini.<br>";
}

// Contoh lain dengan operator 'or'
$nilai = 75;
$hadir = false;

if ($nilai >= 80 or $hadir) {
    echo "Selamat, Anda lulus.<br>";
} else {
    echo "Anda perlu meningkatkan nilai atau hadir.<br>";
}
?>
