<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['mata_pelajaran', 'hari', 'jam_mulai', 'jam_selesai'];

}
