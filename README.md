# Latihan PHP + MySQL

## Deskripsi
Repositori ini berisi kumpulan latihan PHP, mulai dari dasar (variabel, operator, percabangan, form) hingga modul sederhana berbasis database (CRUD Kategori, Artikel, dan daftar Produk) dengan tampilan menggunakan Tailwind CSS (via CDN).

- Halaman dasar ada di root (`index.php`, `variabel.php`, `aritmatika.php`, dll.)
- Modul database ada di folder `database/` dengan dashboard sederhana dan menu navigasi.

## Fitur
- **Latihan dasar**: variabel, konstanta, operator aritmatika, tipe data, percabangan `if` dan `switch`, form GET/POST.
- **Dashboard database** (`database/index.php`):
  - **Kategori**: tampil, tambah, edit.
  - **Artikel**: tampil, tambah, edit, hapus; relasi ke kategori, dukungan gambar (path URL).
  - **Produk**: daftar produk beserta kategori dan harga.
- **Koneksi database** menggunakan `mysqli` di `database/koneksi.php`.
- **UI** memanfaatkan Tailwind via CDN.

## Prasyarat
- PHP 7.4+ (disarankan PHP 8+)
- MySQL/MariaDB
- Web server (Apache/Nginx). Rekomendasi: Laragon/XAMPP/WAMP.
- Browser modern

## Instalasi Cepat (Laragon di Windows)
1. Salin folder proyek ke `C:\laragon\www\latihan` (sudah sesuai pada lingkungan Anda).
2. Jalankan Laragon, start Apache dan MySQL.
3. Buat database bernama `latihan`.
4. Atur kredensial di `database/koneksi.php` jika perlu.
5. Akses di browser:
   - Halaman latihan dasar: `http://localhost/latihan/`
   - Dashboard database: `http://localhost/latihan/database/`

## Konfigurasi Database
File: `database/koneksi.php`
```php
$server = "localhost";
$user = "root";
$pass = "";
$db   = "latihan";
$conn = mysqli_connect($server, $user, $pass, $db);
```
Pastikan nama database, user, dan password sesuai dengan lingkungan Anda.

### Tabel yang Digunakan
Anda dapat membuat struktur minimal berikut (sesuaikan jika sudah punya skema sendiri):

```sql
CREATE TABLE kategori (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(100) NOT NULL
);

CREATE TABLE artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200) NOT NULL,
  isi TEXT NOT NULL,
  gambar VARCHAR(255) DEFAULT NULL,
  kategori_id INT NOT NULL,
  CONSTRAINT fk_artikel_kategori FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

CREATE TABLE produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(200) NOT NULL,
  harga DECIMAL(12,2) NOT NULL DEFAULT 0,
  gambar VARCHAR(255) DEFAULT NULL,
  kategori_id INT NOT NULL,
  CONSTRAINT fk_produk_kategori FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);
```

Catatan: Aplikasi menampilkan gambar berdasarkan path/URL yang disimpan pada kolom `gambar`.

## Cara Menjalankan
- Buka `http://localhost/latihan/` untuk melihat contoh-contoh HTML/PHP dasar (mis. `variabel.php`, `aritmatika.php`, `if_tunggal.php`, form GET/POST, dll.).
- Buka `http://localhost/latihan/database/` untuk dashboard modul database:
  - Menu kiri: Dashboard, Kategori, Artikel, Produk.
  - Navigasi dilakukan via parameter `page` yang di-whitelist di `database/index.php`.

## Struktur Proyek (ringkas)
```
latihan/
├─ index.php                 # Contoh dasar HTML
├─ variabel.php, aritmatika.php, ...
├─ form.php, form_get.php, form_post.php
├─ fungsi_terbilang.php, faktur.php, apotik.php, tokokue.php, ...
└─ database/
   ├─ index.php              # Dashboard + routing whitelist (page)
   ├─ koneksi.php            # Koneksi mysqli
   ├─ dashboard.php
   ├─ tampil_kategori.php, tambah_kategori.php, edit_kategori.php
   ├─ tampil_artikel.php, tambah_artikel.php, edit_artikel.php
   ├─ tampil_produk.php
   └─ uploads/               # (opsional) direktori upload
```

## Keamanan & Catatan
- Query menggunakan `mysqli` dasar; untuk produksi, pertimbangkan prepared statements.
- Sudah ada whitelist halaman di `database/index.php` untuk mencegah file inclusion.
- Tailwind dimuat via CDN untuk kemudahan; produksi sebaiknya build lokal.
- Validasi dan sanitasi input sebaiknya diperketat (server-side dan client-side).

## Lisensi
Gunakan bebas untuk keperluan belajar/praktik. Tambahkan lisensi jika diperlukan. 