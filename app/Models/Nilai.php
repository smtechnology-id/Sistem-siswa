<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';

    protected $fillable = [
        'nilai',
        'semester',
        'tahun_ajaran',
        'matapelajaran_id',
        'siswa_id',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'matapelajaran_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
