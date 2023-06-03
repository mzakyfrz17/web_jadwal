<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        // Kolom lain yang diperlukan
    ];

    // Relasi atau method lain bisa ditambahkan di sini

}
