<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'prodi_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(Jurusan::class, 'id', 'prodi_id');
    }

    public function detail_ruangan()
    {
        return $this->hasMany(Jurusan::class, 'id', 'prodi_id');
    }
}
