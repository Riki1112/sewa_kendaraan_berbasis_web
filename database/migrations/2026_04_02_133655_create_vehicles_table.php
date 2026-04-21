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
    Schema::create('vehicles', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kendaraan');
        $table->string('merek');
        $table->string('plat_nomor');
        $table->integer('tahun');
        $table->integer('harga_sewa');
        $table->string('status_ketersediaan');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();

        // 7 field wajib
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
        Schema::dropIfExists('vehicles');
    }
};
