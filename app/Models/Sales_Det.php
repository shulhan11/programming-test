<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_Det extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
