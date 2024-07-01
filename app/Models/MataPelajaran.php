<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'kelas_id',
        'nama_matapelajaran',
        'jadwal',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
