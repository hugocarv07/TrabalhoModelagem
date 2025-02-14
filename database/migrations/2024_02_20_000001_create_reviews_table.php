<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('reviews')) {
            Schema::create('reviews', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Quem fez a avaliação
                $table->foreignId('contributor_id')->references('id')->on('users')->onDelete('cascade'); // Avaliado
                $table->tinyInteger('rating')->unsigned(); // Nota de 1 a 5
                $table->text('comment')->nullable(); // Comentário opcional
                $table->timestamps();

                // Garante que um usuário só pode avaliar um contribuinte uma vez
                $table->unique(['user_id', 'contributor_id']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
