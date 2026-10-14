<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'kategori_id',
        'nama',
        'Nama_makanan',
        'list-makanan',
    ];
}