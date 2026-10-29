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
        Schema::create('battles', function (Blueprint $table) {
            $table->id();

            $table->integer('kratos_health');
            $table->integer('kratos_strength');
            $table->integer('kratos_defence');
            $table->integer('kratos_speed');
            $table->decimal('kratos_luck', 5, 2);

            $table->integer('monster_health');
            $table->integer('monster_strength');
            $table->integer('monster_defence');
            $table->integer('monster_speed');
            $table->decimal('monster_luck', 5, 2);

            $table->string('winner')->nullable();
            $table->integer('total_turns');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battles');
    }
};
