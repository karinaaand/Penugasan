<?php

namespace App\Models\Transaction;

use App\Models\Master\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $guarded = [];
    //retur memiliki relasi one-one dengan transasi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class)->first();
    }
    public function trans()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
    //retur memiliki relasi one-one dengan obat
    public function drug()
    {
        return $this->belongsTo(Drug::class)->first();
    }
    //retur memiliki relasi one-one dengan detail transaksi
    public function detail()
    {
        return $this->belongsTo(TransactionDetail::class,'transaction_detail_id','id')->first();
    }
    //retur memiliki relasi one-one dengan detail transaksi sumber obat tersebut dibuang
    public function source()
    {
        return $this->belongsTo(TransactionDetail::class,'source','id')->first();
    }
}