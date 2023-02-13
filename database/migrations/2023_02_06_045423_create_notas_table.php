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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['Hp', 'Printer', 'Leptop', 'Bimbel'])->default('Leptop');
            $table->string('nama_barang');
            $table->string('keterangan');
            $table->foreignId('pelanggan_id')
            ->constrained()
            ->onDelete('cascade');
            $table->enum('status', ['BS', 'S'])->default('BS');
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
        Schema::dropIfExists('notas');
    }
};
