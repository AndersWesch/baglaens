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
            ['name' => 'Algeria', 'short' => 'DZA'],
            ['name' => 'Australia', 'short' => 'AUS'],
            ['name' => 'Azerbaijan', 'short' => 'AZE'],
            ['name' => 'Belarus', 'short' => 'BLR'],
            ['name' => 'Belgium', 'short' => 'BEL'],
            ['name' => 'Bulgaria', 'short' => 'BUL'],
            ['name' => 'Canada', 'short' => 'CAD'],
            ['name' => 'China', 'short' => 'CHN'],
            ['name' => 'Colombia', 'short' => 'COL'],
            ['name' => 'Denmark', 'short' => 'DNK'],
            ['name' => 'England', 'short' => 'ENG'],
            ['name' => 'France', 'short' => 'FRA'],
            ['name' => 'Germany', 'short' => 'GER'],
            ['name' => 'Great Britain', 'short' => 'GBR'],
            ['name' => 'India', 'short' => 'IND'],
            ['name' => 'Japan', 'short' => 'JPN'],
            ['name' => 'Kazakhstan', 'short' => 'KAZ'],
            ['name' => 'Netherlands', 'short' => 'NLD'],
            ['name' => 'Poland', 'short' => 'POL'],
            ['name' => 'Portugal', 'short' => 'POR'],
            ['name' => 'Russia', 'short' => 'RUS'],
            ['name' => 'Spain', 'short' => 'ESP'],
            ['name' => 'Sweden', 'short' => 'SWE'],
            ['name' => 'Ukraine', 'short' => 'UKR'],
            ['name' => 'United States', 'short' => 'USA'],
            ['name' => 'Uzbekistan', 'short' => 'UZB'],
            ['name' => 'South Africa', 'short' => 'ZAF'],
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
