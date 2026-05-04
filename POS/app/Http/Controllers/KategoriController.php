<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // Menampilkan semua data kategori dengan Query Builder
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // Insert data baru ke tabel m_kategori
        $data = [
            'nama_kategori' => 'Snack/Makanan Ringan',
            'deskripsi' => 'Produk snack dan makanan ringan',
            'created_at' => now()
        ];
        DB::table('m_kategori')->insert($data);
        return 'Insert data baru berhasil!';
    }

    public function update(Request $request, $id)
    {
        // Update data di tabel m_kategori
        $row = DB::table('m_kategori')->where('nama_kategori', 'Snack/Makanan Ringan')->update(['nama_kategori' => 'Camilan']);
        return 'Update data berhasil!. Jumlah data yang diupdate: ' . $row . ' baris';
    }

    public function destroy($id)
    {
        // Delete data dari tabel m_kategori
        $row = DB::table('m_kategori')->where('nama_kategori', 'Camilan')->delete();
        return 'Delete data berhasil!. Jumlah data yang dihapus: ' . $row . ' baris';
    }
}


