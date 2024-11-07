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
        if(str_contains($this->name,'1 pack')){
            $this->quantity = $drug->piece_netto*$drug->piece_quantity;
        }
        if($this->quantity==$drug->piece_netto){
            $this->margin = $drug->piece_margin;
        }elseif($this->quantity==($drug->piece_netto*$drug->piece_quantity)){
            $this->margin = $drug->pack_margin;
        }
        $this->price = $drug->calculate_price($this->quantity,$this->margin);
        $this->save();
    }
}
