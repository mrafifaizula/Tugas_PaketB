<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $fillable = ['nim', 'kelas', 'jk', 'agama', 'alamat', 'nama'];
    public $visible = ['nim', 'kelas', 'jk', 'agama', 'alamat', 'nama'];
    public $timestamps = true;

    public function koperasi()
    {
        return $this->hasMany(Koperasi::class, 'id_mhs');
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/mahasiswa/' . $this->foto))) {
            return unlink(public_path('images/mahasiswa/' . $this->foto));
        }
    }
}
