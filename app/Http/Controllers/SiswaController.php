<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.dashboard');
    }
    public function nilai()
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)->get(); // Mengambil data siswa berdasarkan user yang sedang login
        $mataPelajaran = MataPelajaran::all(); // Mengambil semua data mata pelajaran

        return view('siswa.nilai', compact('siswa', 'mataPelajaran'));
    }
    public function jadwal()
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)->get(); // Mengambil data siswa berdasarkan user yang sedang login
        $mataPelajaran = MataPelajaran::all(); // Mengambil semua data mata pelajaran

        return view('siswa.jadwal', compact('siswa', 'mataPelajaran'));
    }
}
