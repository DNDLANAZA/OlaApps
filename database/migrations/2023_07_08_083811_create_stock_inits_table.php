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
        Schema::create('stock_inits', function (Blueprint $table) {
            $table->id();
            $table->float('gaz')->nullable();
            $table->float('gazoil')->nullable();
            $table->float('lubrifiant')->nullable();
            $table->float('petrole')->nullable();
            $table->float('super')->nullable();
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
        Schema::dropIfExists('stock_inits');
    }
};
