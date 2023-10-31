<?php

use App\Enums\FaturamentoStatusEnum;
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
        Schema::create('faturamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manutencao_id');
            $table->decimal('valor', 10, 2);
            $table->text('descricao');
            $table->enum('status', FaturamentoStatusEnum::labels());
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faturamento');
    }
};
