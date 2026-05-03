# Laporan Praktikum-2.1: Pembuatan File Migrasi dengan Relasi

## Tanggal: 3 Mei 2026

### Tujuan
Membuat file migrasi database dengan relasi menggunakan Laravel untuk tabel POS System.

### Hasil yang Dicapai

#### 1. Tabel Master yang Berhasil Dibuat
- ✅ **m_level** - Master Level/Tingkat User
  - Kolom: id, level_name, description, timestamps
  
- ✅ **m_kategori** - Master Kategori Produk
  - Kolom: id, nama_kategori, deskripsi, timestamps
  
- ✅ **m_supplier** - Master Supplier
  - Kolom: id, nama_supplier, alamat, telepon, email, timestamps

#### 2. Tabel Utama dengan Foreign Key
- ✅ **users** - Data User (terdapat relasi dengan m_level)
  - Kolom: id, name, email, email_verified_at, password, remember_token, timestamps

- ✅ **categories** - Kategori (sudah ada di structure)
  - Kolom: id, name, description, timestamps

- ✅ **products** - Produk dengan relasi ke categories
  - Kolom: id, name, description, price, stock, category_id (FK), timestamps

- ✅ **sales** - Penjualan dengan relasi ke products dan users
  - Kolom: id, product_id (FK), user_id (FK), quantity, total_price, sale_date, timestamps

#### 3. Tabel Sistem Laravel
- ✅ **migrations** - Tracking migrasi
- ✅ **failed_jobs** - Tracking job yang gagal
- ✅ **password_reset_tokens** - Token reset password
- ✅ **sessions** - Session pengguna

### File Migrasi yang Dibuat
1. `2026_05_03_000000_create_m_level_table.php`
2. `2026_05_03_000001_create_users_table.php`
3. `2026_05_03_000002_create_categories_table.php`
4. `2026_05_03_000003_create_products_table.php`
5. `2026_05_03_000004_create_sales_table.php`
6. `2026_05_03_000005_create_m_kategori_table.php`
7. `2026_05_03_000006_create_m_supplier_table.php`

### Konfigurasi Database
Database: `pwl_pos`
Host: 127.0.0.1
Port: 3306
Driver: MySQL

### Status
✅ **SELESAI** - Semua migrasi berhasil dijalankan dengan seed data
