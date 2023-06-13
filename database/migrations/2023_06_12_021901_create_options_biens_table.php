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
        Schema::create('options_biens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idBiens');
            $table->foreign('idBiens')
            ->references('id')
            ->on('biens_immos')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('idOpt');
            $table->foreign('idOpt')
            ->references('id')
            ->on('options_immos')
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
        Schema::dropIfExists('options_biens');
    }
};
