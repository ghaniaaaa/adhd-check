<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $fillable = [
        "judul", 
        "isi", 
        "kode_kecenderungan", 
        "url_gambar"
    ];

    public function kecenderungan()
    {
        return $this->belongsTo(TingkatKecenderungan::class, 'kode_kecenderungan', 'kode_kecenderungan');
    }

}
