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
        Schema::create('tb_harga_produk', function (Blueprint $table) {
            $table->id();
            $table->date('start_harga');
            $table->date('end_harga');
            $table->decimal('harga_produk', 10, 2); // Ubah angka 10 dan 2 sesuai dengan kebutuhan presisi dan skala untuk harga_produk
            $table->unsignedBigInteger('id_produk'); // Gantikan 'produk' dengan nama tabel produk yang sesuai
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
        Schema::dropIfExists('tb_harga_produk');
    }
};
