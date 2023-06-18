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
        Schema::create('purchaseinfos', function (Blueprint $table) {
            $table->id();
            $table->string('purchaseid');
            $table->string('productid');
            $table->string('categoryid');
            $table->string('suppliarid');
            $table->float('unitcost');
            $table->string('quentity');
            $table->decimal('vat');
            $table->float('totalprice');
            $table->float('Sellsprice');
            $table->string('other')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaseinfos');
    }
};
