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

        $bulgariaId = DB::table('countries')->where('name', 'Bulgaria')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Sofia', 'country_id' => $bulgariaId],
        ]);

        $azerbaijanId = DB::table('countries')->where('name', 'Azerbaijan')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Baku', 'country_id' => $azerbaijanId],
        ]);

        $japanId = DB::table('countries')->where('name', 'Japan')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Tokyo', 'country_id' => $japanId],
        ]);

        $russiaId = DB::table('countries')->where('name', 'Russia')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'St. Petersburg', 'country_id' => $russiaId],
        ]);

        $unitedId = DB::table('countries')->where('name', 'United States')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Daytona', 'country_id' => $unitedId],
        ]);

        $englandId = DB::table('countries')->where('name', 'England')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Birmingham', 'country_id' => $englandId],
        ]);

        $franceId = DB::table('countries')->where('name', 'France')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Metz', 'country_id' => $franceId],
        ]);

        $canadaId = DB::table('countries')->where('name', 'Canada')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Quebec', 'country_id' => $canadaId],
        ]);

        $netherlandsId = DB::table('countries')->where('name', 'Netherlands')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Eindhoven', 'country_id' => $netherlandsId],
        ]);

        $germanyId = DB::table('countries')->where('name', 'Germany')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Hanover', 'country_id' => $germanyId],
        ]);

        $southAfricaId = DB::table('countries')->where('name', 'South Africa')->first()->id;
        DB::table('cities')->insert([
            ['name' => 'Sun City', 'country_id' => $southAfricaId],
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
