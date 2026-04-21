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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();

        // RELASI
        $table->foreignId('booking_id')->constrained()->onDelete('cascade');

        // DATA PAYMENT
        $table->string('order_id');
        $table->string('payment_type');
        $table->string('transaction_status');
        $table->integer('gross_amount');
        $table->dateTime('transaction_time')->nullable();
        $table->dateTime('settlement_time')->nullable();

        // 7 field
        $table->string('companyCode',32)->nullable();
        $table->tinyInteger('status')->default(1);
        $table->tinyInteger('isDeleted')->default(0);
        $table->string('createdBy',32)->nullable();
        $table->dateTime('createdDate')->nullable();
        $table->string('lastUpdateBy',32)->nullable();
        $table->dateTime('lastUpdateDate')->nullable();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
