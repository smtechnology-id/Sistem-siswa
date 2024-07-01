<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';

    protected $fillable = [
        'siswa_id',
        'jumlah_masuk',
        'jumlah_tidak_masuk',
        'jumlah_ijin',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
