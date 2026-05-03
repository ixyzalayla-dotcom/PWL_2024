# Laporan Praktikum-2.2: Pembuatan File Migrasi dengan Relasi

## Tanggal: 3 Mei 2026

### Tujuan
Membuat file migrasi database dengan relasi (foreign key) menggunakan Laravel untuk tabel POS System.

### Hasil yang Dicapai

#### Praktikum-2.1: Master Data Tables
- ✅ **m_level** - Master Level/Tingkat User
- ✅ **m_kategori** - Master Kategori Produk
- ✅ **m_supplier** - Master Supplier

#### Praktikum-2.2: Tables with Foreign Key Relations

**1. Tabel m_user (Master User dengan FK ke m_level)**
```sql
id (PK)
username (unique)
email (unique)
level_id (FK) → m_level.id
name
password
remember_token
timestamps
```

**2. Tabel m_barang (Master Barang dengan FK ke m_kategori)**
```sql
id (PK)
kode_barang (unique)
nama_barang
deskripsi
kategori_id (FK) → m_kategori.id
harga (decimal 10,2)
stok (integer)
timestamps
```

**3. Tabel t_penjualan (Transaksi Penjualan dengan FK ke m_user)**
```sql
id (PK)
user_id (FK) → m_user.id
tanggal_penjualan (datetime)
total_harga (decimal 12,2)
keterangan
timestamps
```

### Struktur Foreign Key
- `m_user.level_id` → `m_level.id` (Relasi Many-to-One)
- `m_barang.kategori_id` → `m_kategori.id` (Relasi Many-to-One)
- `t_penjualan.user_id` → `m_user.id` (Relasi Many-to-One)

### File Migrasi yang Dibuat
1. `2026_05_03_000000_create_m_level_table.php`
2. `2026_05_03_000001_create_users_table.php`
3. `2026_05_03_000002_create_categories_table.php`
4. `2026_05_03_000003_create_products_table.php`
5. `2026_05_03_000004_create_sales_table.php`
6. `2026_05_03_000005_create_m_kategori_table.php`
7. `2026_05_03_000006_create_m_supplier_table.php`
8. `2026_05_03_000007_create_m_user_table.php` ⭐ NEW
9. `2026_05_03_000008_create_m_barang_table.php` ⭐ NEW
10. `2026_05_03_000009_create_t_penjualan_table.php` ⭐ NEW

### Implementasi Foreign Key
- Setiap tabel dengan relasi menggunakan `unsignedBigInteger()` untuk kolom FK
- Penambahan `.index()` pada kolom FK untuk performa query
- Penggunaan `.foreign()` method untuk definisi constraint
- `.references('id').on('table_name')` untuk menunjuk ke tabel tujuan

### Database Configuration
- Database: `pwl_pos`
- Host: 127.0.0.1
- Port: 3306
- Driver: MySQL

### Status
✅ **SELESAI** - Semua migrasi berhasil dijalankan dengan seed data
✅ **TOTAL TABEL**: 10 tabel berhasil dibuat dengan relasi yang benar
