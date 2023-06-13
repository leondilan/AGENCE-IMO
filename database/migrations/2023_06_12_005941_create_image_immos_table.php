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
        Schema::create('image_immos', function (Blueprint $table) {
            $table->id();
            $table->string('nomImage');
            $table->unsignedBigInteger('idBiens');
            $table->foreign('idBiens')
            ->references('id')
            ->on('biens_immos')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_immos');
    }
};
