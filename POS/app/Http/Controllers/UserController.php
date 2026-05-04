<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    // coba akses model userModel
    public function index()
    {
        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }

    // method store untuk tambah data
    public function store(Request $request)
    {
        $data = [
            'user_id' => 4,
            'username' => 'customer-1',
            'nama' => 'Pelanggan',
            'password' => bcrypt('12345'),
            'level_id' => 4
        ];
        UserModel::create($data); // tambahkan data ke tabel m_user
        
        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }

    // method update untuk update data
    public function update(Request $request, $id)
    {
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('user_id', $id)->update($data); // update data user
        
        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }

    // Pastikan ada ($id, $name) di sini
    public function profile($id, $name) 
    {
        // Pastikan variabel dilempar ke view melalui array
        return view('user.profile', ['id' => $id, 'name' => $name]);
    }
}