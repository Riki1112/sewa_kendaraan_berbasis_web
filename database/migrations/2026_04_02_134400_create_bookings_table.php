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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        // RELASI
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');

        // DATA BOOKING
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->integer('lama_sewa');
        $table->integer('total_harga');
        $table->string('status_booking');

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
        Schema::dropIfExists('bookings');
    }
};
