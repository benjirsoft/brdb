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
        Schema::create('pcsellsinfos', function (Blueprint $table) {
            $table->id();
            $table->string('counterid');
            $table->string('showroomid');
            $table->string('productid');
            $table->string('quentity');
            $table->float('totalprice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcsellsinfos');
    }
};
