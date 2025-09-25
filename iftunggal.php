<?php
$nilai1 = 90;
$nilai2 = 90;
$nilai3 = 90;
$rata_rata = ($nilai1 + $nilai2 + $nilai3) / 3;
if ($rata_rata >= 90) {
    $grade = "A";
}else{
    $grade = "B";
}
echo "grade adalah : $grade <br>";
?>