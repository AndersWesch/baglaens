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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->timestamps();
        });

        $denmarkId = DB::table('countries')->where('name', 'Denmark')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Odense', 'country_id' => $denmarkId],
            ['name' => 'Holstebro', 'country_id' => $denmarkId],
            ['name' => 'Silkeborg', 'country_id' => $denmarkId],
            ['name' => 'Outrup', 'country_id' => $denmarkId],
            ['name' => 'Svendborg', 'country_id' => $denmarkId],
            ['name' => 'Flemming', 'country_id' => $denmarkId],
            ['name' => 'Haslev', 'country_id' => $denmarkId],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
