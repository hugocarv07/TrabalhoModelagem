<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rating')->default(0)->after('country'); // Adiciona a coluna de avaliação
            $table->integer('completed_orders')->default(0)->after('rating'); // Adiciona a coluna de pedidos concluídos
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['rating', 'completed_orders']);
        });
    }
};
