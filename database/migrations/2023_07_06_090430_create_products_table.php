<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('name')->references('id')->on('producttypes')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('quantite')->nullable();
            $table->string('datecreation')->nullable();
            $table->string('fichier')->nullable();
            $table->string('fournisseur')->nullable();
            $table->string('unite')->nullable();
            $table->timestamps();
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
