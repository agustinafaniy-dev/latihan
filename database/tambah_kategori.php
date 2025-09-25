
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <div class="flex items-center justify-center mb-6">
            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Kategori</h2>
        </div>

        <?php
        include 'koneksi.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);

            $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama')";
            if (mysqli_query($conn, $query)) {
                echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Kategori berhasil ditambahkan!</span>";
                echo "</div>";
                header("refresh:2;url=tampil_kategori.php");
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Error: " . mysqli_error($conn) . "</span>";
                echo "</div>";
            }
        }

        mysqli_close($conn);
        ?>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" id="nama" name="nama" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Masukkan nama kategori">
            </div>

            <div class="flex items-center justify-between">
                <a href="tampil_kategori.php" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah
                </button>
            </div>
        </form>
    </div>

