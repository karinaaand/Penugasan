<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repack extends Model
{
    use HasFactory;
    public function drug(){
        return $this->belongsTo(Drug::class)->first();
    }
}
