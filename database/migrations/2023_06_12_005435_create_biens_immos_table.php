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
        Schema::create('biens_immos', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('surface');
            $table->integer('prix');
            $table->longText('description');
            $table->integer('piece');
            $table->integer('chambre');
            $table->string('addresses');
            $table->string('ville');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('biens_immos');
    }
};
