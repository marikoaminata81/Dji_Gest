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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("uid")->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('adresse');
            $table->string('quartier');
            $table->date('date_de_naissance');
            $table->string('descripcion');
            $table->string('statut_client');

            $table->bigInteger('num_compteur')->unsigned();
            $table->foreign('num_compteur')->references('id')->on('compteurs')->onDelete('cascade');

          
            $table->bigInteger('type_client_id')->unsigned();
            $table->foreign('type_client_id')->references('id')->on('type_clients')->onDelete('cascade');

           
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
