<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Jenjang;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jenjang_id',
        'jurusan_id',
        'status',
    ];

    // Relasi ke Jenjang
    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'jenjang_id');
    }

    // Relasi ke Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
