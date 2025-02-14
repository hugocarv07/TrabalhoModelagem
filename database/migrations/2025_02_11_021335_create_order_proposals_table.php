<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_request_id')->constrained()->onDelete('cascade'); // ID da encomenda
            $table->foreignId('contributor_id')->constrained('users')->onDelete('cascade'); // ID do colaborador
            $table->string('phone'); // Telefone do colaborador
            $table->string('client_phone')->nullable();
            $table->text('message'); // Mensagem para o cliente
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Status da proposta
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_proposals');
    }
};

