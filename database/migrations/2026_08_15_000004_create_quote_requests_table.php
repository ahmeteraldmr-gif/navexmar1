<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone');
            $table->string('vessel_name');
            $table->string('vessel_type');
            $table->integer('grt')->nullable();
            $table->string('port_or_strait'); // İstanbul Boğazı, Çanakkale Boğazı, Ambarlı, Haydarpaşa, İzmit, Mersin, vb.
            $table->string('eta_date')->nullable();
            $table->json('requested_services')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('Yeni'); // Yeni, İnceleniyor, Cevaplandı, Arşivlendi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
