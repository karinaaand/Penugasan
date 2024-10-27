<?php

namespace App\Models\Master;

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
}
