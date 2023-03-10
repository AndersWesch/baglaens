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
        Schema::create('passes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tumbler_id');
            $table->foreign('tumbler_id')->references('id')->on('tumblers');

            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id')->references('id')->on('competitions');

            $table->string('pass');

            $table->double('execution')->nullable();
            $table->double('difficulty')->nullable();
            $table->double('total_score')->nullable();

            $table->string('video_url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passes');
    }
};
