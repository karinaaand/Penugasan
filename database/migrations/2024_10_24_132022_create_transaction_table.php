<?php

use App\Models\Master\Drug;
use App\Models\Master\Repack;
use App\Models\Master\Vendor;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
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
            $table->char('code',12)->nullable();
            $table->foreignIdFor(Vendor::class)->nullable();
            $table->enum('destination',['customer','clinic','warehouse']);
            $table->enum('method',['credit','cash'])->nullable();
            $table->enum('variant',['LPB','LPK','Checkout','Trash','Retur'])->nullable();
            $table->integer('income')->nullable();
            $table->integer('outcome')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('loss')->nullable();
            $table->timestamps();
        });
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction::class);
            $table->foreignIdFor(Drug::class);
            $table->integer('stock')->nullable();
            $table->boolean('used')->nullable();
            $table->boolean('margin')->nullable();
            $table->date('expired');
            $table->string('name');
            $table->string('quantity');
            $table->integer('piece_price');
            $table->integer('total_price');
            $table->timestamps();
        });
        Schema::create('bills',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Transaction::class);
            $table->integer('total');
            $table->enum('status',['Belum Bayar','Done']);
            $table->date('arrive');
            $table->date('due');
            $table->timestamps();
        });
        Schema::create('returs',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Drug::class);
            $table->foreignIdFor(Transaction::class);
            $table->foreignIdFor(TransactionDetail::class);
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
            $table->foreignIdFor(Transaction::class);
            $table->foreignIdFor(TransactionDetail::class);
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
