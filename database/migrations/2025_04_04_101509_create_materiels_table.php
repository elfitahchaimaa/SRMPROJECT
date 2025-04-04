<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')-> unique();
            $table->string('type');
            $table->string('marque');
            $table->string('modele');
            $table->string('systeme_exploitation')->nullable();
            $table->integer('quantite')->default(1);
            $table->date('date_achat')->nullable();
            $table->text('observations')->nullable();
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiels');
    }
};