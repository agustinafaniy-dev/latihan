
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori</h2>
            <a href="?page=tambah_kategori" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Kategori
            </a>
        </div>
        <?php
        include 'koneksi.php';

        $query = "SELECT * FROM kategori";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='overflow-x-auto'>";
            echo "<table class='min-w-full bg-white border border-gray-300'>";
            echo "<thead class='bg-gray-50'>";
            echo "<tr>";
            echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>No</th>";
            echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Nama Kategori</th>";
            echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Aksi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='bg-white divide-y divide-gray-200'>";

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='hover:bg-gray-50'>";
                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $no . "</td>";
                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" . $row['nama_kategori'] . "</td>";
                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>";
                echo "<a href='?page=edit_kategori?id=" . $row['id'] . "' class='text-indigo-600 hover:text-indigo-900 mr-3 inline-flex items-center'>";
                echo "<svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path>";
                echo "</svg>";
                echo "Edit";
                echo "</a>";
                echo "<a href='?page=hapus_kategori?id=" . $row['id'] . "' class='text-red-600 hover:text-red-900 inline-flex items-center' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>";
                echo "<svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>";
                echo "</svg>";
                echo "Hapus";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p class='text-gray-500 text-center py-8'>Tidak ada kategori ditemukan.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
