<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->bigInteger('pembeli_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->double('total');
            $table->timestamps();
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('pembeli_id')->references('id')->on('pembelis')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksi_pembeli_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_pembeli_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_user_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksi_user_id_foreign');
        });

        Schema::dropIfExists('transaksis');
    }
};
