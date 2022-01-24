<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->foreignId('branch_id')->constrained();
            $table->integer('servicetime');
            $table->string('price');
            $table->string('prepayment');
            $table->string('file')->nullable()->default('storage/person/1.png');
            $table->string('period')->nullable();
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
        Schema::dropIfExists('services');
    }
}
