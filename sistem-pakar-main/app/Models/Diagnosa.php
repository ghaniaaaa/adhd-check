<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'diagnosas';

    protected $guarded = ["id"];

    protected $fillable = [
        "kode_diagnosa", 
        "data_diagnosa", 
        "hasil"
    ];

    public function user()
    {
    return $this->belongsTo(\App\Models\User::class);
    }

}
