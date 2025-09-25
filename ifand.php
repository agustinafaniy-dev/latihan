<?php
// Contoh penggunaan if dengan kondisi AND (&&)

$umur = 20;
$punyaKTP = false;

if ($umur >= 18 && $punyaKTP) {
    echo "Anda boleh memilih dalam pemilu.<br>";
} else {
    echo "Anda tidak boleh memilih dalam pemilu.<br>";
}

// Contoh lain dengan operator 'and'
$nilai = 85;
$hadir = true;

if ($nilai >= 80 and $hadir) {
    echo "Selamat, Anda lulus dengan predikat baik.<br>";
} else {
    echo "Anda perlu meningkatkan nilai atau kehadiran.<br>";
}
?>
