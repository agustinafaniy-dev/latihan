<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <div class="flex items-center justify-center mb-6">
            <svg class="w-8 h-8 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Edit Kategori</h2>
        </div>

        <?php
        include 'koneksi.php';

        $id = $_GET['id'] ?? 0;
        $nama = '';

        if ($id > 0) {
            $query = "SELECT * FROM kategori WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nama = $row['nama'];
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Kategori tidak ditemukan!</span>";
                echo "</div>";
                exit;
            }
        } else {
            echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
            echo "<span class='block sm:inline'>ID kategori tidak valid!</span>";
            echo "</div>";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_baru = mysqli_real_escape_string($conn, $_POST['nama']);

            $query = "UPDATE kategori SET nama = '$nama_baru' WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Kategori berhasil diupdate!</span>";
                echo "</div>";
                header("refresh:2;url=index.php?page=kategori");
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
                <input type="text" id="nama" name="nama" required value="<?php echo htmlspecialchars($nama); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                       placeholder="Masukkan nama kategori">
            </div>

            <div class="flex items-center justify-between">
                <a href="index.php?page=kategori" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
