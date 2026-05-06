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
        $user = UserModel::firstOrNew(
            ['username' => 'manager33'],
            [
                'user_id' => 7,
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ]
        );
        $user->save();
        return view('user', ['data' => $user]);
    }
}