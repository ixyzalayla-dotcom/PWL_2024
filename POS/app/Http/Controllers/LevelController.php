<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of all levels
     */
    public function index()
    {
        $levels = DB::table('m_level')->get();
        return view('levels.index', ['levels' => $levels]);
    }

    /**
     * Store a newly created level in database
     */
    public function store(Request $request)
    {
        DB::table('m_level')->insert([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/level')->with('success', 'Level berhasil ditambahkan');
    }
}
