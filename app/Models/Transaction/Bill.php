<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = [];
    //tagihan memiliki relasi one-one dengan transasi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class)->first();
    }
    public function trans()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
}
