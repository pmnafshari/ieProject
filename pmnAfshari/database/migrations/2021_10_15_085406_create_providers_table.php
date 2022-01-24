<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->string('ncode')->nullable();
            $table->enum('gender',['مرد','زن'])->default('زن')->nullable();
            $table->string('degree')->nullable();
            $table->string('address')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->enum('status',['فعال','غیرفعال'])->default('فعال');

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
        Schema::dropIfExists('providers');
    }
}
