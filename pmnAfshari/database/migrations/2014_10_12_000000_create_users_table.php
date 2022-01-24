<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('ncode')->unique()->default(null)->nullable();
            $table->enum('gender',['زن','مرد'])->default('زن')->nullable();
            $table->date('date_of_birth')->default(null)->nullable();
            $table->string('degree')->default(null)->nullable();
            $table->string('password');
            $table->enum('marital_status',['متاهل','مجرد'])->default('مجرد')->nullable();
            $table->date('marriage_date')->nullable()->default(null);
            $table->enum('child_status',['بله','خیر'])->default('خیر')->nullable();
            $table->string('address')->default(null)->nullable();
            $table->string('file')->default('storage/person/1.png')->nullable();
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
        Schema::dropIfExists('users');
    }
}
