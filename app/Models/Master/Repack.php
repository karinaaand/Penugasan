<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repack extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function drug(){
        return $this->belongsTo(Drug::class)->first();
    }
    public function update_price(){
        $drug = $this->drug();
        $this->price = $drug->calculate_price($this->quantity,$this->margin);
        $this->save();
    }
}
