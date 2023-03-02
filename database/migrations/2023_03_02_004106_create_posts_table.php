<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('users'); // Chiave esterna riferita all'utente registrato autore del post
            $table->foreignId('association_id')->constrainded(); // Chiave esterna riferita all'associazione nella quale si trova il post
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
