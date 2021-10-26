<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasOne(transaksi::class,'transaksi_details_id', 'id');
    }

    public function detail_ruangan()
    {
        return $this->belongsTo(DetailRuangan::class, 'detail_ruangans_id', 'id');
    }
}
