<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil_sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'visi',
        'misi',
    ];
}