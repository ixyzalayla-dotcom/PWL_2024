<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserController extends Controller
{
    // coba akses model userModel
    public function index()
    {
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function store(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $data = UserModel::find($id);
        return view('user_ubah', ['data' => $data]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $data = UserModel::find($id);
        $data->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

    public function update(Request $request, $id)
    {
        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function profile($id, $name)
    {
        return view('user.profile', ['id' => $id, 'name' => $name]);
    }
}