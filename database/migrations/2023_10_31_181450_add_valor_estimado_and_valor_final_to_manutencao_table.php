<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            $table->decimal('valor_estimado', 10, 2)->nullable();
            $table->decimal('valor_final', 10, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            $table->dropColumn('valor_estimado');
            $table->dropColumn('valor_final');
        });
    }
};
