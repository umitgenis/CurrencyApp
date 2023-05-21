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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->string('usd_buying')->nullable();
            $table->string('usd_selling')->nullable();
            $table->string('eur_buying')->nullable();
            $table->string('eur_selling')->nullable();
            $table->string('gbp_buying')->nullable();
            $table->string('gbp_selling')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
