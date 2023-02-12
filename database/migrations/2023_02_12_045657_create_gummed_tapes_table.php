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
        Schema::create('gummed_tapes', function (Blueprint $table) {
            $table->id();
            $table->integer('boxes');
            $table->double('reinforced_50', 8, 2)->nullable();
            $table->double('reinforced_60', 8, 2)->nullable();
            $table->double('reinforced_70', 8, 2)->nullable();
            $table->double('reinforced_80', 8, 2)->nullable();
            $table->double('unreinforced_50', 8, 2)->nullable();
            $table->double('unreinforced_60', 8, 2)->nullable();
            $table->double('unreinforced_70', 8, 2)->nullable();
            $table->double('unreinforced_80', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gummed_tapes');
    }
};
