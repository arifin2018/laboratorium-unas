<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRuangan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Gallery()
    {
        return $this->hasMany(GalleryRuangan::class, 'detail_ruangans_id' , 'id');
    }

    // public function WaktuDetailRuangan()
    // {
    //     return $this->hasMany(WaktuDetailRuangan::class, 'details_ruangan_id', 'id');
    // }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'detail_ruangans_id', 'id');
    }

    public function transaksi_detail()
    {
        return $this->hasOne(TransaksiDetail::class, 'detail_ruangans_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
