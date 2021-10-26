<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryRuangan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function detail_ruangan()
    {
        return $this->belongsTo(DetailRuangan::class , 'detail_ruangans_id', 'id');
    }
}
