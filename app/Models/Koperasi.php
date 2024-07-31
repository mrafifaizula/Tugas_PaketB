<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;
    // public $fillable = ['id_mhs', 'jml', 'tgl'];
    // public $visible = ['id_mhs', 'jml', 'tgl'];
    // public $timestamps = true;

     public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }

}
