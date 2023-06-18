<?php

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
        Schema::create('purchasegroups', function (Blueprint $table) {
            $table->id();
            $table->string('purchaseid');
            $table->string('orderid')->nullable();
            $table->string('suppliarid');
            $table->string('productid');
            $table->date('purchasedate');
            $table->integer('qty');
            $table->integer('vat');
            $table->float('totalsellsprice');
            $table->float('unitcost');
            $table->float('customerprice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasegroups');
    }
};
