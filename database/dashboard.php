<?php
include 'koneksi.php';

$query_kat = "SELECT COUNT(*) as total FROM kategori";
$result_kat = mysqli_query($conn, $query_kat);
$kat = mysqli_fetch_assoc($result_kat);

$query_art = "SELECT COUNT(*) as total FROM artikel";
$result_art = mysqli_query($conn, $query_art);
$art = mysqli_fetch_assoc($result_art);

$query_prod = "SELECT COUNT(*) as total FROM produk";
$result_prod = mysqli_query($conn, $query_prod);
$prod = mysqli_fetch_assoc($result_prod);
?>

<div class="p-6 bg-white rounded shadow grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="flex items-center space-x-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition">
        <div class="p-3 bg-blue-500 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3m10-5v4a1 1 0 01-1 1h-3m-6 4h6" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-semibold">Total Kategori</p>
            <p class="text-2xl font-bold"><?php echo $kat['total']; ?></p>
        </div>
    </div>
    <div class="flex items-center space-x-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition">
        <div class="p-3 bg-green-500 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V7a2 2 0 00-2-2H7a2 2 0 00-2 2v4" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-semibold">Total Artikel</p>
            <p class="text-2xl font-bold"><?php echo $art['total']; ?></p>
        </div>
    </div>
    <div class="flex items-center space-x-4 p-4 border rounded-lg shadow-sm hover:shadow-md transition">
        <div class="p-3 bg-red-500 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M3 18h18" />
            </svg>
        </div>
        <div>
            <p class="text-lg font-semibold">Total Produk</p>
            <p class="text-2xl font-bold"><?php echo $prod['total']; ?></p>
        </div>
    </div>
</div>
<?php
mysqli_close($conn);
?>
