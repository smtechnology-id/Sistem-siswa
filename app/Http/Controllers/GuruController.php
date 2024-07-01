<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard');
    }
    public function kelas()
    {
        $kelas = Kelas::all();
        return view('guru.kelas', compact('kelas'));
    }
    public function addKelas(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        // Simpan data kelas baru ke dalam database
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'nama_guru' => $request->nama_guru,
            'tingkat' => $request->tingkat,
        ]);

        // Redirect dengan flash message jika berhasil
        return redirect()->route('guru.kelas')->with('success', 'Kelas berhasil ditambahkan!');
    }
    public function updateKelas(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:kelas,id',
            'nama_kelas' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        $kelas = Kelas::findOrFail($request->id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'nama_guru' => $request->nama_guru,
            'tingkat' => $request->tingkat,
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil diperbarui!');
    }
    public function siswa()
    {
        $kelas = Kelas::all(); // Ambil semua kelas untuk dropdown
        $siswa = Siswa::all();

        return view('guru.siswa', compact('kelas', 'siswa'));
    }
    public function siswaPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'siswa', // Sesuaikan dengan role siswa
        ]);

        // Simpan siswa baru
        Siswa::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Data siswa berhasil disimpan!');
    }

    public function siswaUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users,email,' . $request->user_id,
            'password' => 'nullable|string|min:8',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Update user data
        $user = User::findOrFail($request->user_id);
        $user->email = $request->email;
        $user->name = $request->nama;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Update siswa data
        $siswa = Siswa::findOrFail($id);
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama = $request->nama;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
    }
    public function deleteSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Delete the related user
        $user = User::findOrFail($siswa->user_id);
        $user->delete();

        // Delete the siswa
        $siswa->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
    public function mapel()
    {
        $mapel = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('guru.mataPelajaran', compact('mapel', 'kelas'));
    }
    public function mapelPost(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_matapelajaran' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
        ]);

        MataPelajaran::create([
            'kelas_id' => $request->kelas_id,
            'nama_matapelajaran' => $request->nama_matapelajaran,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->back()->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_matapelajaran' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
        ]);

        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->update([
            'kelas_id' => $request->kelas_id,
            'nama_matapelajaran' => $request->nama_matapelajaran,
            'jadwal' => $request->jadwal,
        ]);

        return back()->with('success', 'Mata Pelajaran berhasil diupdate');
    }
    public function deleteMapel($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->delete();

        return back()->with('success', 'Mata Pelajaran berhasil dihapus');
    }

    public function pilihKelas()
    {
        $kelas = Kelas::all();
        return view('guru.pilihKelas', compact('kelas'));
    }
    public function nilai($id)
    {
        $kelas = Kelas::findOrFail($id);
        $mataPelajaran = MataPelajaran::where('kelas_id', $id)->get();
        $siswa = Siswa::where('kelas_id', $id)->with('nilai')->get();

        return view('guru.nilai', compact('siswa', 'mataPelajaran', 'kelas'));
    }
    public function addNilai(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'matapelajaran_id' => 'required',
            'nilai' => 'required|numeric',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'matapelajaran_id' => $request->matapelajaran_id,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan.');
    }
    public function updateNilai(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'matapelajaran_id' => 'required|exists:mata_pelajaran,id',
            'nilai' => 'required|numeric',
            'semester' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);

        $nilai = Nilai::where('siswa_id', $request->siswa_id)
            ->where('matapelajaran_id', $request->matapelajaran_id)
            ->first();

        if ($nilai) {
            $nilai->update([
                'nilai' => $request->nilai,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
            ]);
        } else {
            // Jika tidak ditemukan, buat nilai baru (opsional)
            Nilai::create([
                'siswa_id' => $request->siswa_id,
                'matapelajaran_id' => $request->matapelajaran_id,
                'nilai' => $request->nilai,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
            ]);
        }

        return back()->with('success', 'Nilai berhasil diperbarui');
    }


    public function pilihAbsensi()
    {
        $kelas = Kelas::all();
        return view('guru.pilihAbsensi', compact('kelas'));
    }
    public function showAbsensi($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::where('kelas_id', $id)->with('absensi')->get();
        return view('guru.absensi', compact('kelas', 'siswa'));
    }
    public function addAbsensi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah_masuk' => 'required|integer',
            'jumlah_tidak_masuk' => 'required|integer',
            'jumlah_ijin' => 'required|integer',
        ]);

        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'jumlah_masuk' => $request->jumlah_masuk,
            'jumlah_tidak_masuk' => $request->jumlah_tidak_masuk,
            'jumlah_ijin' => $request->jumlah_ijin,
        ]);

        return back()->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function updateAbsensi(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jumlah_masuk' => 'required|integer',
            'jumlah_tidak_masuk' => 'required|integer',
            'jumlah_ijin' => 'required|integer',
        ]);

        $absensi = Absensi::where('siswa_id', $request->siswa_id)->first();
        if ($absensi) {
            $absensi->update([
                'jumlah_masuk' => $request->jumlah_masuk,
                'jumlah_tidak_masuk' => $request->jumlah_tidak_masuk,
                'jumlah_ijin' => $request->jumlah_ijin,
            ]);
        }

        return back()->with('success', 'Absensi berhasil diupdate.');
    }

    public function deleteAbsensi($id)
    {
        $absensi = Absensi::find($id);
        if ($absensi) {
            $absensi->delete();
        }

        return back()->with('success', 'Absensi berhasil dihapus.');
    }
    public function pilihJadwal()
    {
        $kelas = Kelas::all();
        return view('guru.pilihJadwal', compact('kelas'));
    }

    public function jadwal($id) 
    {
        $kelas = Kelas::where('id', $id)->first();
        $mataPelajaran = MataPelajaran::where('kelas_id', $kelas->id)->get(); // Mengambil semua data mata pelajaran

        return view('guru.jadwal', compact('kelas', 'mataPelajaran'));
    }
    public function deleteKelas($id)
    {
        // Temukan kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Jika kelas ditemukan, hapus
        if ($kelas) {
            $kelas->delete();
            return redirect()->back()->with('success', 'Kelas berhasil dihapus.');
        }

        // Jika kelas tidak ditemukan, kembalikan pesan error
        return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
    }
}
