<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="#" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">Dashboard</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/32" alt="User avatar">
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden" id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 h-screen">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase">Menu</span>
            </div>
            <nav class="mt-10">
                <a href="index.php?page=dashboard" class="flex items-center py-2 px-8 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span class="mx-2">Dashboard</span>
                </a>
                <a href="index.php?page=tampil_kategori" class="flex items-center py-2 px-8 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span class="mx-2">Kategori</span>
                </a>
                <a href="index.php?page=tampil_artikel" class="flex items-center py-2 px-8 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span class="mx-2">Artikel</span>
                </a>
                <a href="index.php?page=tampil_produk" class="flex items-center py-2 px-8 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span class="mx-2">Produk</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <?php
            ob_clean();
            ob_start();
            include("koneksi.php");
            $page = isset($_GET['page']) ? $_GET['page'] : '';
            if ($page == '') {
                include "dashboard.php";
            } else {
                // whitelist allowed pages to prevent file inclusion vulnerability
                $allowed_pages = [
                    'dashboard',
                    'tampil_kategori',
                    'tambah_kategori',
                    'edit_kategori',
                    'tampil_artikel',
                    'tambah_artikel',
                    'edit_artikel',
                    'tampil_produk'
                ];
                if (in_array($page, $allowed_pages)) {
                    include $page . ".php";
                } else {
                    echo "<h1 class='text-2xl font-bold mb-4'>Halaman tidak ditemukan</h1>";
                    echo "<p>Maaf, halaman yang Anda cari tidak ada.</p>";
                }
            }
            
            ?>
        </div>
    </div>

    <script>
        // Simple dropdown toggle
        document.getElementById('user-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
