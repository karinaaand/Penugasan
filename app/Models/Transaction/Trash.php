<?php

namespace App\Models\Transaction;

use App\Models\Master\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    protected $guarded = [];
    //obat buang memiliki relasi one-one dengan transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class)->first();
    }
    public function trans()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
    //obat buang memiliki relasi one-one dengan obat
    public function drug()
    {
        return $this->belongsTo(Drug::class)->first();
    }
    //obat buang memiliki relasi one-one dengan detail transaksi
    public function detail()
    {
        return $this->belongsTo(TransactionDetail::class,'transaction_detail_id','id')->first();
    }
}
