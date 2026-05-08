<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('nama_penyewa')->nullable()->after('vehicle_id');
            $table->string('email_penyewa')->nullable()->after('nama_penyewa');
            $table->string('nomor_hp')->nullable()->after('email_penyewa');
            $table->string('alamat')->nullable()->after('nomor_hp');
            $table->text('alamat_lengkap')->nullable()->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'nama_penyewa',
                'email_penyewa',
                'nomor_hp',
                'alamat',
                'alamat_lengkap'
            ]);
        });
    }
};