<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id', 'supplier_id', 'tanggal_masuk', 'jumlah', 'user_id',
    ];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
