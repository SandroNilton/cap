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
        Schema::create('fileprocedures', function (Blueprint $table) {
            $table->id();
            $table->integer('procedure_id');
            $table->integer('requirement_id');
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->boolean('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fileprocedures');
    }
};
