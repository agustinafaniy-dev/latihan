<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-lg p-8">
        <div class="flex items-center justify-center mb-6">
            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800">Edit Artikel</h2>
        </div>

        <?php
        include 'koneksi.php';

        $id = $_GET['id'] ?? 0;
        $judul = $isi = $gambar = '';
        $kategori_id = 0;

        if ($id > 0) {
            $query = "SELECT * FROM artikel WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $judul = $row['judul'];
                $isi = $row['isi'];
                $gambar = $row['gambar'];
                $kategori_id = $row['kategori_id'];
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Artikel tidak ditemukan!</span>";
                echo "</div>";
                exit;
            }
        } else {
            echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
            echo "<span class='block sm:inline'>ID artikel tidak valid!</span>";
            echo "</div>";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul_baru = mysqli_real_escape_string($conn, $_POST['judul']);
            $isi_baru = mysqli_real_escape_string($conn, $_POST['isi']);
            $kategori_id_baru = (int)$_POST['kategori_id'];
            $gambar_baru = $gambar; // keep old if not uploaded

            // Handle file upload
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    $gambar_baru = $target_file;
                }
            }

            $query = "UPDATE artikel SET judul = '$judul_baru', isi = '$isi_baru', gambar = '$gambar_baru', kategori_id = $kategori_id_baru WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Artikel berhasil diupdate!</span>";
                echo "</div>";
                header("refresh:2;url=index.php?page=tampil_artikel");
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4' role='alert'>";
                echo "<span class='block sm:inline'>Error: " . mysqli_error($conn) . "</span>";
                echo "</div>";
            }
        }

        // Fetch kategori for select
        $kategori_query = "SELECT * FROM kategori";
        $kategori_result = mysqli_query($conn, $kategori_query);

        mysqli_close($conn);
        ?>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" id="judul" name="judul" required value="<?php echo htmlspecialchars($judul); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Masukkan judul artikel">
            </div>

            <div>
                <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Artikel</label>
                <textarea id="isi" name="isi" rows="6" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Masukkan isi artikel"><?php echo htmlspecialchars($isi); ?></textarea>
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select id="kategori_id" name="kategori_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Kategori</option>
                    <?php while ($kat = mysqli_fetch_assoc($kategori_result)) { ?>
                        <option value="<?php echo $kat['id']; ?>" <?php if ($kat['id'] == $kategori_id) echo 'selected'; ?>><?php echo $kat['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar (Opsional)</label>
                <?php if (!empty($gambar)) { ?>
                    <img src="<?php echo $gambar; ?>" alt="Gambar Lama" class="w-32 h-auto mb-2">
                    <p class="text-sm text-gray-500 mb-2">Gambar lama akan diganti jika Anda upload gambar baru.</p>
                <?php } ?>
                <input type="file" id="gambar" name="gambar" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <a href="index.php?page=tampil_artikel" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-flex items-center">
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
