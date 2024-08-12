<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pasien', 'nama', 'usia', 'jenis_kelamin', 'alamat', 'telepon'
    ];
}
