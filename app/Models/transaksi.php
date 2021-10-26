<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function detail_ruangans()
    {
        return $this->belongsTo(DetailRuangan::class, 'detail_ruangans_id', 'id');
    }

    public function transaksi_details()
    {
        return $this->belongsTo(TransaksiDetail::class, 'transaksi_details_id', 'id');
    }
}
