<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buying_id')->constrained();
            $table->string('peyment')->nullable();
            $table->string('debt')->nullable();
            $table->string('code')->nullable();
            $table->string('discount')->nullable();
            $table->enum('status',['پرداخت شده','در انتظار پرداخت'])->default('در انتظار پرداخت');
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
        Schema::dropIfExists('invoices');
    }
}
