<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vessel_type'); // Container, Bulk Carrier, Oil Tanker, Ro-Ro, Superyacht
            $table->string('flag');
            $table->integer('imo_number')->unique();
            $table->integer('grt'); // Gross Tonnage
            $table->integer('dwt')->nullable(); // Deadweight Tonnage
            $table->string('image')->nullable();
            $table->string('last_port')->nullable();
            $table->string('operation_type'); // Boğaz Geçişi, Liman İkmali, Mürettebat Değişimi, Yükleme/Tahliye
            $table->string('status')->default('Tamamlandı'); // Devam Ediyor, Tamamlandı, Beklemede
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vessels');
    }
};
