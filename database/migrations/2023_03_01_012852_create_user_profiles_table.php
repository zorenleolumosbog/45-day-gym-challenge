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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->enum('gym_experience', ['less than 12 months', '12-36 months', '36 months and over']);
            $table->string('hours_of_sleep_at_night');
            $table->string('stress_level_out_of_10');
            $table->string('medications_supplements');
            $table->string('injuries_illnesses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
