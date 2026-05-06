# Laporan Praktikum-2.3: Tabel Transaksi dengan Multiple Foreign Keys

## Tanggal: 3 Mei 2026

### Tujuan
Membuat tabel transaksi dengan relasi multiple foreign key menggunakan Laravel untuk sistem POS.

### Hasil yang Dicapai

#### Tabel Transaksi yang Dibuat

**1. Tabel t_stok (Transaksi Stok dengan FK ke m_barang)**
```sql
id (PK)
barang_id (FK) → m_barang.id
jumlah_stok (integer)
tanggal_update (datetime)
keterangan (string, nullable)
timestamps
```
**Fungsi**: Mencatat perubahan stok barang setiap waktu

---

**2. Tabel t_penjualan_detail (Detail Penjualan dengan Multiple FK)**
```sql
id (PK)
penjualan_id (FK) → t_penjualan.id
barang_id (FK) → m_barang.id
jumlah (integer)
harga_satuan (decimal 10,2)
subtotal (decimal 12,2)
timestamps
```
**Fungsi**: Menyimpan detail item-item yang dijual dalam satu transaksi penjualan

---

### Struktur Relasi Database Lengkap

```
m_level
  ├── 1 ─── m (m_user.level_id)
  
m_kategori
  ├── 1 ─── m (m_barang.kategori_id)
  
m_barang
  ├── 1 ─── m (t_stok.barang_id)
  └── 1 ─── m (t_penjualan_detail.barang_id)
  
m_user
  └── 1 ─── m (t_penjualan.user_id)
  
t_penjualan
  └── 1 ─── m (t_penjualan_detail.penjualan_id)
```

### File Migrasi (Update)
1. `2026_05_03_000000_create_m_level_table.php`
2. `2026_05_03_000001_create_users_table.php`
3. `2026_05_03_000002_create_categories_table.php`
4. `2026_05_03_000003_create_products_table.php`
5. `2026_05_03_000004_create_sales_table.php`
6. `2026_05_03_000005_create_m_kategori_table.php`
7. `2026_05_03_000006_create_m_supplier_table.php`
8. `2026_05_03_000007_create_m_user_table.php`
9. `2026_05_03_000008_create_m_barang_table.php`
10. `2026_05_03_000009_create_t_penjualan_table.php`
11. `2026_05_03_000010_create_t_stok_table.php` ⭐ NEW
12. `2026_05_03_000011_create_t_penjualan_detail_table.php` ⭐ NEW

### Penerapan Best Practices
- ✅ Multiple foreign keys dalam satu tabel
- ✅ Index pada semua kolom foreign key
- ✅ Naming convention yang konsisten (t_* untuk transaksi)
- ✅ Constraint untuk integritas referensial
- ✅ Timestamp tracking untuk audit trail

### Database Configuration
- Database: `pwl_pos`
- Host: 127.0.0.1
- Port: 3306
- Driver: MySQL

### Status
✅ **SELESAI** - Semua migrasi berhasil dijalankan
✅ **TOTAL TABEL**: 12 tabel dengan relasi kompleks
✅ **FOREIGN KEYS**: 7 relasi telah didefinisikan
