<?php

namespace App\Models\Inventory;

use App\Models\Master\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinic_inventory';
    protected $guarded = [];
    //sebuah data stok memiliki relasi dengan master obat 
    public function drug(){
        return $this->belongsTo(Drug::class)->first();
    }
    //sebuah data stok memiliki relasi dengan master obat, dibedakan dengan method drug karena agar dapat menggunakan keyword with
    public function data(){
        return $this->belongsTo(Drug::class,'drug_id','id');
    }
}
