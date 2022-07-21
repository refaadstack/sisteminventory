<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangOut extends Model
{
    use HasFactory;

    protected $fillable = [ 'nama_pembeli','tanggal_keluar', 'jumlah', 'status', 'total',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class,'id','barang_id');
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class,'barangOut_id');
    }
}
