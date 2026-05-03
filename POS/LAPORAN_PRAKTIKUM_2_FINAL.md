# Laporan Praktikum-2: Pembuatan File Migrasi dengan Relasi Database

## Tanggal: 3 Mei 2026

### Tujuan
Membuat file migrasi database dengan relasi foreign key menggunakan Laravel untuk sistem POS.

---

## Struktur Database Final

### Business Tables (7)

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

**3. users** - User Table (Standard Laravel)
```sql
- id (PK) - bigint(20) unsigned
- name (varchar)
- email (varchar, unique)
- email_verified_at (timestamp, nullable)
- password (varchar)
- remember_token (varchar, nullable)
- timestamps
```

**4. m_user** - Master User dengan Level (FK → m_level)
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
├── 2026_05_03_000002_create_users_table.php ⭐ NEW
├── 2026_05_03_000003_create_m_user_table.php
├── 2026_05_03_000004_create_m_barang_table.php
├── 2026_05_03_000005_create_t_penjualan_table.php
├── 2026_05_03_000006_create_t_stok_table.php
├── 2026_05_03_000007_create_t_penjualan_detail_table.php
├── 2026_05_03_000008_create_password_reset_tokens_table.php
├── 2026_05_03_000009_create_personal_access_tokens_table.php
└── 2026_05_03_000010_create_failed_jobs_table.php
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

## Tabel Sistem Laravel (3)

**9. password_reset_tokens** - Password Reset Tokens
```sql
- email (varchar, PK)
- token (varchar)
- created_at (timestamp, nullable)
```

**10. personal_access_tokens** - Personal Access Tokens (API)
```sql
- id (PK)
- tokenable_type (varchar)
- tokenable_id (unsignedBigInteger)
- name (varchar)
- token (varchar, unique)
- abilities (text, nullable)
- last_used_at (timestamp, nullable)
- expires_at (timestamp, nullable)
- timestamps
```

**11. failed_jobs** - Failed Job Tracking
```sql
- id (PK)
- uuid (varchar, unique)
- connection (text)
- queue (text)
- payload (longtext)
- exception (longtext)
- failed_at (timestamp)
```

---

## Database Configuration
- **Database**: pwl_pos
- **Host**: 127.0.0.1
- **Port**: 3306
- **Driver**: MySQL
- **Charset**: utf8mb4

---

## Ringkasan Total Tabel

| Kategori | Tabel | Jumlah |
|----------|-------|--------|
| Master Data | m_level, m_kategori | 2 |
| User Management | users, m_user | 2 |
| Master Business | m_barang | 1 |
| Transaksi | t_penjualan, t_stok, t_penjualan_detail | 3 |
| Sistem Laravel | password_reset_tokens, personal_access_tokens, failed_jobs | 3 |
| **TOTAL** | | **11** |

---

## Status Akhir
✅ **SELESAI** - Database structure lengkap dan siap digunakan
✅ **CLEAN** - m_supplier dan sessions dihapus, users ditambahkan
✅ **TESTED** - Semua migrasi berhasil dijalankan
✅ **PRODUCTION-READY** - Struktur sesuai kebutuhan POS system
