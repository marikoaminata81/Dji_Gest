<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compteurs', function (Blueprint $table) {
            $table->id();
            $table->string("uid")->unique();
            $table->string('numero_compteur');
            $table->enum('type_compteur', [
                "inconnue",
                'Compteur_eau_jet_unique',
                'Compteur_eau_jet_multiple',
                'Compteur_eau_turbine',
                'Compteur_eau_combine'
            ])->default('inconnue');
            $table->string('etat');
            $table->string('marque');
            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compteurs');
    }
};
