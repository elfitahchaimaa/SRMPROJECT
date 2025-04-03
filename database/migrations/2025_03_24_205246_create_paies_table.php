<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Clé étrangère vers la table users
            $table->decimal('salaire_base', 10, 2); // Salaire de base
            $table->decimal('prime_anciennete', 10, 2)->nullable(); // Prime d'ancienneté
            $table->decimal('prime_performance', 10, 2)->nullable(); // Prime de performance
            $table->decimal('heures_supplementaires', 10, 2)->nullable(); // Heures supplémentaires
            $table->decimal('cotisations_sociales', 10, 2); // Cotisations sociales
            $table->decimal('impot_revenu', 10, 2); // Impôt sur le revenu
            $table->decimal('net_a_payer', 10, 2); // Montant net à payer
            $table->date('periode_debut'); // Début de la période de paie
            $table->date('periode_fin'); // Fin de la période de paie
            $table->date('date_paiement'); // Date de paiement
            $table->string('statut')->default('brouillon'); // Statut de la paie (brouillon, validé, payé)
            
            // Clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paies');
    }
}