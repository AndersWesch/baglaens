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
        Schema::create('tumblers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->timestamp('birthday')->nullable();

            $table->string('gender', 16);
            $table->foreign('gender')->references('gender')->on('genders');

            $table->string('instragram_link')->nullable();
            $table->string('sampler_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumblers');
    }
};
