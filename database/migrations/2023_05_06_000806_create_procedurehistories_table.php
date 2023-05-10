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
        Schema::create('procedurehistories', function (Blueprint $table) {
            $table->id();
            $table->integer('procedure_id');
            $table->integer('typeprocedure_id');
            $table->integer('area_id');
            $table->integer('user_id');
            $table->integer('administrator_id')->nullable();
            $table->longText('description')->nullable();
            $table->string('action');
            $table->boolean('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedurehistories');
    }
};
