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
        Schema::create('lettertypes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('letter_code');
            $table->string('name_type');
            $table->integer('surat_tertaut')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lettertypes');
    }
};
