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
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('contributor_id')->references('id')->on('users')->onDelete('cascade');
                $table->integer('rating')->check('rating >= 1 AND rating <= 5');
                $table->text('comment');
                $table->timestamps();
                $table->unique(['user_id', 'contributor_id']);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};