# Laporan Praktikum-3: Pembuatan File Seeder

## Tanggal: 3 Mei 2026

### Tujuan
Membuat file seeder untuk mengisi data awal ke dalam database menggunakan Laravel.

---

## Seeder yang Dibuat

### 1. **LevelSeeder** - Seeder untuk tabel m_level
Mengisi data level pengguna:
- Admin
- Kasir
- Manajer

```php
php artisan make:seeder LevelSeeder
```

**Data yang diinsert:**
```
| level_name | description |
|------------|-------------|
| Admin | Administrator |
| Kasir | Kasir |
| Manajer | Manajer Toko |
```

---

### 2. **KategoriSeeder** - Seeder untuk tabel m_kategori
Mengisi data kategori produk:
- Elektronik
- Makanan
- Pakaian

```php
php artisan make:seeder KategoriSeeder
```

**Data yang diinsert:**
```
| nama_kategori | deskripsi |
|---------------|-----------|
| Elektronik | Produk elektronik |
| Makanan | Produk makanan dan minuman |
| Pakaian | Produk pakaian dan fashion |
```

---

### 3. **UserSeeder** - Seeder untuk tabel users
Mengisi data user standar Laravel:
- Administrator
- Test User

```php
php artisan make:seeder UserSeeder
```

**Data yang diinsert:**
```
| name | email | password |
|------|-------|----------|
| Administrator | admin@example.com | password |
| Test User | user@example.com | password |
```

---

### 4. **MUserSeeder** - Seeder untuk tabel m_user
Mengisi data master user dengan level:
- Admin POS (level: Admin)
- Kasir 1 (level: Kasir)
- Manajer 1 (level: Manajer)

```php
php artisan make:seeder MUserSeeder
```

**Data yang diinsert:**
```
| username | email | level_id | name | password |
|----------|-------|----------|------|----------|
| admin | admin@pos.com | 1 | Admin POS | admin123 |
| kasir1 | kasir1@pos.com | 2 | Kasir 1 | kasir123 |
| manajer1 | manajer1@pos.com | 3 | Manajer 1 | manajer123 |
```

---

### 5. **BarangSeeder** - Seeder untuk tabel m_barang
Mengisi data produk/barang:
- Laptop (Elektronik)
- Mouse (Elektronik)
- Mie Instan (Makanan)
- Kaos (Pakaian)

```php
php artisan make:seeder BarangSeeder
```

**Data yang diinsert:**
```
| kode_barang | nama_barang | kategori_id | harga | stok |
|-------------|-------------|-------------|-------|------|
| ELKT001 | Laptop | 1 | 7500000 | 5 |
| ELKT002 | Mouse | 1 | 150000 | 20 |
| MKAN001 | Mie Instan | 2 | 2500 | 100 |
| PKL001 | Kaos | 3 | 50000 | 30 |
```

---

### 6. **PenjualanSeeder** - Seeder untuk tabel t_penjualan dan t_penjualan_detail
Mengisi data transaksi penjualan:
- Penjualan pertama: Laptop + Mouse
- Penjualan kedua: Mie Instan

```php
php artisan make:seeder PenjualanSeeder
```

**Data t_penjualan:**
```
| user_id | tanggal_penjualan | total_harga | keterangan |
|---------|------------------|-------------|------------|
| 1 | 2026-05-03 | 7650000 | Penjualan pertama |
| 2 | 2026-05-02 | 152500 | Penjualan kedua |
```

**Data t_penjualan_detail:**
```
| penjualan_id | barang_id | jumlah | harga_satuan | subtotal |
|--------------|-----------|--------|--------------|----------|
| 1 | 1 | 1 | 7500000 | 7500000 |
| 1 | 2 | 1 | 150000 | 150000 |
| 2 | 3 | 61 | 2500 | 152500 |
```

---

## Cara Menjalankan Seeder

### 1. Menjalankan semua seeder
```bash
php artisan migrate:fresh --seed
```

### 2. Menjalankan seeder spesifik
```bash
php artisan db:seed --class=LevelSeeder
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=MUserSeeder
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=PenjualanSeeder
```

### 3. Reset dan seed ulang tanpa migration
```bash
php artisan db:seed
```

---

## File Seeder yang Dibuat
```
database/seeders/
├── LevelSeeder.php
├── KategoriSeeder.php
├── UserSeeder.php
├── MUserSeeder.php
├── BarangSeeder.php
├── PenjualanSeeder.php
└── DatabaseSeeder.php (updated)
```

---

## Status Eksekusi
✅ **LevelSeeder** - RUNNING (82ms)
✅ **KategoriSeeder** - RUNNING (4ms)
✅ **UserSeeder** - RUNNING (1,271ms)
✅ **MUserSeeder** - RUNNING (1,119ms)
✅ **BarangSeeder** - RUNNING (4ms)
✅ **PenjualanSeeder** - RUNNING (8ms)

---

## Total Data yang Diinsert
- m_level: 3 records
- m_kategori: 3 records
- users: 2 records
- m_user: 3 records
- m_barang: 4 records
- t_penjualan: 2 records
- t_penjualan_detail: 3 records

**Total: 20 records**

---

## Status
✅ **SELESAI** - Semua seeder berhasil dibuat dan dijalankan
✅ **TERUJI** - Database terisi dengan data dummy untuk pengujian
✅ **PRODUCTION-READY** - Siap untuk development dan testing
