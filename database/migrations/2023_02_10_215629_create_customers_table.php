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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->foreignId('sector_id')->constrained('sectors');
            $table->foreignId('wallet_id')->constrained('wallets');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('customer_status_id')->constrained('customer_statuses');
            $table->foreignId('customer_profile_id')->constrained('customer_profiles');
            $table->enum('type', ["PF", "PJ"]);
            $table->string('ein')->unique();
            $table->string('company_name')->nullable();
            $table->string('name');
            $table->string('company_type')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('extention')->nullable();
            $table->boolean('whatsapp')->default(true);
            $table->string('primary_cfop')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('ipi_immune')->default(false);
            $table->boolean('approved_product')->default(false);
            $table->boolean('credit')->default(false);
            $table->text('comment')->nullable();
            $table->integer('discount');
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
        Schema::dropIfExists('customers');
    }
};
