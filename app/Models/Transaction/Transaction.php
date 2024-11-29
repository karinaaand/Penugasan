<?php

namespace App\Models\Transaction;

use App\Models\Master\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    //transaksi memiliki relasi one-one dengan vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class)->first();
    }
    //transaksi memiliki relasi one-one dengan obat buang(opsional)
    public function trash(){
        return $this->hasOne(Trash::class)->first();
    }
    //transaksi memiliki relasi one-one dengan retur obat(opsional)
    public function retur(){
        return $this->hasOne(Retur::class)->first();
    }
    
    //transaksi memiliki relasi one-many dengan detail transaksi
    public function details()
    {
        return $this->hasMany(TransactionDetail::class)->get();
    }
    public function detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    //melakukan generate kode berdasarkan jenis transaksi
    public function generate_code()
    {
        match ($this->variant) {
            "LPB" => $pre = "LPB",
            "LPK" => $pre = "LPK",
            "Checkout" => $pre = "CHO",
            "Trash" => $pre = "TRS",
            "Retur" => $pre = "RTR",
        };
        $count = Transaction::where('variant', $this->variant)->get()->count();
        $date = now()->format('ymd');
        $sequence = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        $this->code = $pre . $date . $sequence;
        $this->save();
    }
}
