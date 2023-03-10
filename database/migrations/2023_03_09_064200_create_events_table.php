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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('Name');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('contries');

            $table->string('city');
            $table->timestamp('date');
            $table->string('track')->comment('the tumbling track used');

            $table->string('type', 16);
            $table->foreign('type')->references('type')->on('event_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
