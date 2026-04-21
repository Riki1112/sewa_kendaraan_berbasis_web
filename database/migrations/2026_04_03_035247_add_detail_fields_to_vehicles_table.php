<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('warna')->nullable();
            $table->string('transmisi')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->integer('kapasitas_mesin')->nullable();
            $table->integer('jumlah_kursi')->nullable();
            $table->integer('kilometer')->nullable();
            $table->date('tanggal_pajak')->nullable();
            $table->string('status_servis')->nullable();
            $table->date('terakhir_servis')->nullable();
            $table->string('nomor_stnk')->nullable();
            $table->string('nomor_rangka')->nullable();
            $table->string('nomor_mesin')->nullable();
        });
    }

    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'warna',
                'transmisi',
                'bahan_bakar',
                'kapasitas_mesin',
                'jumlah_kursi',
                'kilometer',
                'tanggal_pajak',
                'status_servis',
                'terakhir_servis',
                'nomor_stnk',
                'nomor_rangka',
                'nomor_mesin',
            ]);
        });
    }
};
