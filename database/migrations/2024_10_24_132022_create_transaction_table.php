<?php

use App\Models\Master\Drug;
use App\Models\Master\Vendor;
use App\Models\Transaction\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendor::class)->nullable();
            $table->enum('destination',['customer','clinic','warehouse']);
            $table->enum('method',['credit','cash'])->nullable();
            $table->enum('variant',['LPB','LPB-K','Checkout','Buang'])->nullable();
            $table->integer('income');
            $table->integer('outcome');
            $table->integer('profit');
            $table->integer('loss');
            $table->timestamps();
        });
        Schema::create('bills',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Transaction::class);
            $table->foreignIdFor(Vendor::class);
            $table->char('code',6)->unique();
            $table->integer('total');
            $table->enum('status',['Belum Bayar','Done']);
            $table->date('arrive');
            $table->date('due');
            $table->timestamps();
        });
        Schema::create('returs',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Drug::class);
            $table->foreignIdFor(Vendor::class);
            $table->integer('quantity');
            $table->enum('status',['Belum Bayar','Done']);
            $table->text('reason')->nullable();
            $table->date('request');
            $table->date('due')->nullable();
            $table->timestamps();
        });
        Schema::create('trashes',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Drug::class);
            $table->foreignIdFor(Vendor::class);
            $table->integer('quantity');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('returs');
        Schema::dropIfExists('trashes');
    }
};
