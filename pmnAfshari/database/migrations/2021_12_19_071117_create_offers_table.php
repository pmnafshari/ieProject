<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('total_number')->nullable();
            $table->integer('max')->nullable();
            $table->string('noeTakhfif')->nullable();
            $table->integer('discount_toman')->nullable();
            $table->integer('discount_per')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
