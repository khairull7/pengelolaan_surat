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
        Schema::create('letters', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('lettertype_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->string('letter_perihal');
            $table->json('recipients');
            $table->text('content');
            $table->string('attechment')->nullable();
            $table->foreignUuid('user_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
