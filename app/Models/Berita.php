<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }

    public function BeritaImage()
    {
        return $this->hasMany(BeritaImage::class, 'berita_id', 'id');
    }
}
