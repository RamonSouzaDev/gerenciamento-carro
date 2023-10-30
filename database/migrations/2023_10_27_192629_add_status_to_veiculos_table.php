<?php

use App\Enums\VeiculoStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->enum('status', VeiculoStatusEnum::labels())->nullable()->after('ano');
        });
    }

    public function down()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
