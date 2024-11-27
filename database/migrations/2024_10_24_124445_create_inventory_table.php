<?php

use App\Models\Master\Drug;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //warehouse memiliki relasi dengan obat menggunakan constrain onDelete cascade sehingga ikut terhapus untuk menghindari kekosongan data
        Schema::create('warehouse_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Drug::class)->constrained()->onDelete('cascade');
            $table->integer('quantity');
            //nilai expire secara default boleh null karena default stock
            $table->date('oldest')->nullable();
            $table->date('latest')->nullable();
            $table->timestamps();
        });
        //clinic memiliki relasi dengan obat menggunakan constrain onDelete cascade sehingga ikut terhapus untuk menghindari kekosongan data
        Schema::create('clinic_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Drug::class)->constrained()->onDelete('cascade');
            $table->integer('quantity');
            //nilai expire secara default boleh null karena default stock
            $table->date('oldest')->nullable();
            $table->date('latest')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('warehouse_inventory');
        Schema::dropIfExists('clinic_inventory');
    }
};
