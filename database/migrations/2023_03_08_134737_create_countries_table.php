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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('short')->unique();
            $table->timestamps();
        });

        DB::table('countries')->insert([
            ['name' => 'Australia', 'short' => 'AUS'],
            ['name' => 'Azerbaijan', 'short' => 'AZE'],
            ['name' => 'Belarus', 'short' => 'BLR'],
            ['name' => 'Canada', 'short' => 'CAD'],
            ['name' => 'Colombia', 'short' => 'COL'],
            ['name' => 'Denmark', 'short' => 'DNK'],
            ['name' => 'Great Britain', 'short' => 'GBR'],
            ['name' => 'Russia', 'short' => 'RUS'],
            ['name' => 'Sweden', 'short' => 'SWE'],
            ['name' => 'Ukraine', 'short' => 'UKR'],
            ['name' => 'United States', 'short' => 'USA'],
            ['name' => 'Japan', 'short' => 'JPN'],
            ['name' => 'India', 'short' => 'IND'],
            ['name' => 'France', 'short' => 'FRA'],
            ['name' => 'Algeria', 'short' => 'DZA'],
            ['name' => 'Kazakhstan', 'short' => 'KAZ'],
            ['name' => 'Belgium', 'short' => 'BEL'],
            ['name' => 'China', 'short' => 'CHN'],
            ['name' => 'Portugal', 'short' => 'POR'],
            ['name' => 'Poland', 'short' => 'POL'],
            ['name' => 'Spain', 'short' => 'ESP'],
            ['name' => 'Uzbekistan', 'short' => 'UZB'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
