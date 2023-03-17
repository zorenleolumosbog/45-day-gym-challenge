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
            $table->enum('gender', ['male', 'female']);
            $table->integer('age');
            $table->string('height');
            $table->integer('current_weight');
            $table->integer('desired_weight_goal');
            $table->enum('gym_experience', ['less than 12 months', '12-36 months', '36 months and over']);
            $table->enum('hours_of_sleep_at_night', ['4-5 hours', '7-8 hours', '8 hours above']);
            $table->enum('stress_level_out_of_10', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            $table->string('medications_supplements');
            $table->string('injuries_illnesses');
            $table->timestamps();
            $table->softDeletes();

            $table->unique('user_id');
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
