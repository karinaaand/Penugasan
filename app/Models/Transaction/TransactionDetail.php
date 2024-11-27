<?php

namespace App\Models\Transaction;

use App\Models\Master\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    protected $guarded = [];
    //detail memiliki relasi one-one dengan obat
    public function drug(){
        return $this->belongsTo(Drug::class)->first();
    }
    //detail memiliki relasi one-one dengan transaksi
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
