<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangOut_id',
        'user_id',
        'barang_id',

    ];

    public function barangOut()
    {
        return $this->belongsTo(BarangOut::class, 'barangOut_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
