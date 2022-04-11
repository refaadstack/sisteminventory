<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id', 'nama_pembeli','tanggal_keluar', 'jumlah', 'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }
}
