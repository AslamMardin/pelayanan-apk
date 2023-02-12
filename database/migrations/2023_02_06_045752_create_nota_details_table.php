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
        Schema::create('nota_details', function (Blueprint $table) {
            $table->id();
            $table->date('garansi');
            $table->float('pemasukan', 12, 0)->default(0);
            $table->float('pengeluaran', 12, 0)->default(0);
            $table->foreignId('nota_id')
            ->constrained()
            ->onDelete('cascade');
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
        Schema::dropIfExists('nota_details');
    }
};
