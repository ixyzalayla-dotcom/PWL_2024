<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Pastikan ada ($id, $name) di sini
    public function profile($id, $name) 
    {
        // Pastikan variabel dilempar ke view melalui array
        return view('user.profile', ['id' => $id, 'name' => $name]);
    }
}