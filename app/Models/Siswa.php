<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    
    protected $fillable = ['kelas_id', 'user_id', 'nama', 'tanggal_lahir', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke nilai (satu siswa memiliki banyak nilai)
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id', 'id');
    }
}
