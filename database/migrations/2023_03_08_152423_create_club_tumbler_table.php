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
        Schema::create('club_tumbler', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs');

            $table->unsignedBigInteger('tumbler_id');
            $table->foreign('tumbler_id')->references('id')->on('tumblers');

            $table->timestamp('start_date');
            $table->timestamp('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_tumbler');
    }
};
