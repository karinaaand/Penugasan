<?php

namespace App\Models\Transaction;

use App\Models\Master\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class)->first();
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class)->first();
    }
    public function detail()
    {
        return $this->belongsTo(TransactionDetail::class,'transaction_detail_id','id')->first();
    }
    public function source()
    {
        return $this->belongsTo(TransactionDetail::class,'source','id')->first();
    }
}
