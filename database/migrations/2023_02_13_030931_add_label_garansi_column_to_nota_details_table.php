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
        Schema::table('nota_details', function (Blueprint $table) {
            $table->integer('label_garansi')->after('garansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_details', function (Blueprint $table) {
            if (Schema::hasColumn('nota_details', 'label_garansi')) {
                $table->dropColumn('label_garansi');
            }
        });
    }
};
