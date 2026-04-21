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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('phone')->nullable();
        $table->string('role')->default('user');

        // 7 field wajib dari dosen
        $table->string('companyCode',32)->nullable();
        $table->tinyInteger('status')->default(1);
        $table->tinyInteger('isDeleted')->default(0);
        $table->string('createdBy',32)->nullable();
        $table->dateTime('createdDate')->nullable();
        $table->string('lastUpdateBy',32)->nullable();
        $table->dateTime('lastUpdateDate')->nullable();

        $table->rememberToken();
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
};
