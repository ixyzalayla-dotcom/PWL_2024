# Laporan Praktikum-2: Pembuatan File Migrasi dengan Relasi Database

## Tanggal: 3 Mei 2026

### Tujuan
Membuat file migrasi database dengan relasi foreign key menggunakan Laravel untuk sistem POS.

---

## Struktur Database Final

### Tabel Master (tanpa FK)

**1. m_level** - Master Level User
```sql
- id (PK) - bigint(20) unsigned
- level_name (varchar)
- description (text, nullable)
- timestamps
```

**2. m_kategori** - Master Kategori Produk
```sql
- id (PK) - bigint(20) unsigned
- nama_kategori (varchar)
- deskripsi (text, nullable)
- timestamps
```

**3. m_supplier** - Master Supplier
```sql
- id (PK) - bigint(20) unsigned
- nama_supplier (varchar)
- alamat (varchar, nullable)
- telepon (varchar, nullable)
- email (varchar, nullable)
- timestamps
```

---

### Tabel dengan Foreign Key

**4. m_user** - Master User (FK → m_level)
```sql
- id (PK) - bigint(20) unsigned
- username (varchar, unique)
- email (varchar, unique)
- level_id (FK) → m_level.id ⭐
- name (varchar)
- password (varchar)
- remember_token (varchar, nullable)
- timestamps
```

**5. m_barang** - Master Barang (FK → m_kategori)
```sql
- id (PK) - bigint(20) unsigned
- kode_barang (varchar, unique)
- nama_barang (varchar)
- deskripsi (text, nullable)
- kategori_id (FK) → m_kategori.id ⭐
- harga (decimal 10,2)
- stok (integer, default 0)
- timestamps
```

---

### Tabel Transaksi

**6. t_penjualan** - Transaksi Penjualan (FK → m_user)
```sql
- id (PK) - bigint(20) unsigned
- user_id (FK) → m_user.id ⭐
- tanggal_penjualan (datetime)
- total_harga (decimal 12,2)
- keterangan (varchar, nullable)
- timestamps
```

**7. t_stok** - Transaksi Stok (FK → m_barang)
```sql
- id (PK) - bigint(20) unsigned
- barang_id (FK) → m_barang.id ⭐
- jumlah_stok (integer)
- tanggal_update (datetime)
- keterangan (varchar, nullable)
- timestamps
```

**8. t_penjualan_detail** - Detail Penjualan (Multiple FK)
```sql
- id (PK) - bigint(20) unsigned
- penjualan_id (FK) → t_penjualan.id ⭐
- barang_id (FK) → m_barang.id ⭐
- jumlah (integer)
- harga_satuan (decimal 10,2)
- subtotal (decimal 12,2)
- timestamps
```

---

## Relasi Database

```
m_level
  ├─ 1 ─── m ─→ m_user.level_id

m_kategori
  ├─ 1 ─── m ─→ m_barang.kategori_id

m_supplier
  └─ (Master data, tidak memiliki FK)

m_user
  └─ 1 ─── m ─→ t_penjualan.user_id

m_barang
  ├─ 1 ─── m ─→ t_stok.barang_id
  └─ 1 ─── m ─→ t_penjualan_detail.barang_id

t_penjualan
  └─ 1 ─── m ─→ t_penjualan_detail.penjualan_id

t_stok
  └─ (Leaf node - transaksi stok)

t_penjualan_detail
  └─ (Leaf node - detail penjualan)
```

---

## File Migrasi yang Digunakan

```
database/migrations/
├── 2026_05_03_000000_create_m_level_table.php
├── 2026_05_03_000001_create_m_kategori_table.php
├── 2026_05_03_000002_create_m_supplier_table.php
├── 2026_05_03_000003_create_m_user_table.php
├── 2026_05_03_000004_create_m_barang_table.php
├── 2026_05_03_000005_create_t_penjualan_table.php
├── 2026_05_03_000006_create_t_stok_table.php
└── 2026_05_03_000007_create_t_penjualan_detail_table.php
```

---

## Implementasi Best Practices

✅ **Foreign Key Management**
- Setiap kolom FK menggunakan `unsignedBigInteger()`
- Semua FK dikonfigurasi dengan `.index()` untuk performa
- Constraint didefinisikan dengan `.foreign()` method

✅ **Naming Convention**
- Prefix `m_` untuk tabel master
- Prefix `t_` untuk tabel transaksi
- Nama kolom FK: `{singularNamaTable}_id`

✅ **Database Integrity**
- Cascade behavior (default Laravel)
- Timestamp tracking untuk audit
- Default values pada kolom yang relevan

✅ **Struktur Tabel**
- Total: 8 tabel (+ 1 migrations table)
- Foreign Keys: 7 relasi
- Tanpa tabel legacy atau tidak perlu

---

## Database Configuration
- **Database**: pwl_pos
- **Host**: 127.0.0.1
- **Port**: 3306
- **Driver**: MySQL
- **Charset**: utf8mb4

---

## Status Akhir
✅ **SELESAI** - Database structure siap digunakan
✅ **CLEAN** - Hanya tabel yang diperlukan saja
✅ **TESTED** - Semua migrasi berhasil dijalankan
