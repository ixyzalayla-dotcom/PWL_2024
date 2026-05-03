# URLs untuk Project PWL_2024

## Main Project (PWL_2024)
- **Home**: http://localhost:8001
- **Route /pos**: Redirect ke POS System

## POS System
- **Direct Access**: http://localhost:8002
- **From Main Project**: http://localhost:8001/pos

### POS Routes:
- **Home**: http://localhost:8002/
- **Food & Beverage**: http://localhost:8002/category/food-beverage
- **Beauty & Health**: http://localhost:8002/category/beauty-health
- **Home Care**: http://localhost:8002/category/home-care
- **Baby & Kid**: http://localhost:8002/category/baby-kid
- **Penjualan (Dashboard)**: http://localhost:8002/penjualan
- **User Profile**: http://localhost:8002/user/{id}/name/{name}
- **Transaksi (New!)**:
  - List: http://localhost:8002/transactions
  - Create: http://localhost:8002/transactions/create
  - Show: http://localhost:8002/transactions/{id}

## Features - Halaman Transaksi

### 1. List Transaksi (`/transactions`)
- Menampilkan semua transaksi dengan pagination
- Statistik: Transaksi hari ini & Total penjualan hari ini
- Aksi: Lihat detail & Hapus transaksi
- Tombol: Tambah Transaksi Baru

### 2. Create Transaksi (`/transactions/create`)
- Form untuk membuat transaksi baru
- Pilih Produk (dengan info stok)
- Pilih User/Kasir
- Input Jumlah (Qty)
- Real-time calculation untuk Total Harga
- Validasi stok (tidak boleh lebih dari stok tersedia)
- Success message setelah submit

### 3. Show Transaksi (`/transactions/{id}`)
- Menampilkan detail lengkap transaksi
- Info: ID, Tanggal, Produk, Kasir, Email, Kategori
- Summary: Harga Satuan, Jumlah, Total Harga
- Status: Selesai
- Aksi: Kembali & Hapus

### 4. Delete Transaksi
- Konfirmasi sebelum hapus
- Otomatis restore stok produk saat dihapus
- Redirect ke list dengan success message

## Database
- **Type**: SQLite
- **Location**: storage/database.sqlite

## Running Servers

### Start POS Server
```bash
cd c:\laragon\www\PWL_2024\POS
php artisan serve --host=0.0.0.0 --port=8002
```

### Start Main Project Server (if needed)
```bash
cd c:\laragon\www\PWL_2024
php artisan serve --host=localhost --port=8001
```

## Notes
- Semua data produk, kategori, dan penjualan sudah tersedia di database
- Styling dan UI sudah diimplementasikan dengan CSS inline
- Data sample sudah di-seed otomatis pada migration:fresh
- Transaksi baru akan mengurangi stok produk secara otomatis
- Menghapus transaksi akan me-restore stok produk ke kondisi sebelumnya
