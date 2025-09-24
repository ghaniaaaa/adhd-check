<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKecenderungan extends Model
{
    use HasFactory;
    protected $table = 'tingkat_kecenderungan';
    protected $guard = ["id"];
    protected $fillable = [
        'kode_kecenderungan', 
        'kecenderungan_adhd'
    ];
}
