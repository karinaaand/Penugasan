<?php

namespace App\Models\Master;

use App\Models\Inventory\Clinic;
use App\Models\Inventory\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class)->first();
    }
    public function variant(){
        return $this->belongsTo(Variant::class)->first();
    }
    public function manufacture(){
        return $this->belongsTo(Manufacture::class)->first();
    }
    public function repacks(){
        return $this->hasMany(Repack::class)->get();
    }
    public function warehouse(){
        return $this->hasOne(Warehouse::class);
    }
    public function default_repacks(){
        Repack::create([
            "drug_id"=>$this->id,
            "name"=>$this->name." 1 pack",
            "quantity"=> $this->piece_quantity*$this->piece_netto,
            "margin"=>$this->pack_margin,
            "price"=>$this->calculate_price($this->piece_quantity*$this->piece_netto,$this->pack_margin)
        ]);
        Repack::create([
            "drug_id"=>$this->id,
            "name"=>$this->name." 1 pcs",
            "quantity"=> $this->piece_netto,
            "margin"=>$this->piece_margin,
            "price"=>$this->calculate_price($this->piece_netto,$this->piece_margin)
        ]);
    }
    public function default_stock(){
        Warehouse::create([
            "drug_id"=>$this->id,
            "quantity"=> 0,
        ]);
        Clinic::create([
            "drug_id"=>$this->id,
            "quantity"=> 0,
        ]);
    }

    public function calculate_price(int $quantity,int $margin){
        $nett_price = $this->last_price/$this->piece_netto;
        if($this->last_price!=0){
            return $quantity*$nett_price*(100+$margin)/100;
        }
        return 0;
    }
    public function getBoxPriceAttribute(){
        return $this->pack_quantity*$this->piece_quantity*$this->last_price;
    }
    public function getPackPriceAttribute(){
        return $this->piece_quantity*$this->last_price;
    }
}
