<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EventType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->timestamp('date');
            $table->string('track')->nullable()->comment('the tumbling track used');

            $table->string('type', 16);
            $table->foreign('type')->references('type')->on('event_types');

            $table->timestamps();
        });

        $this->createWorldChampionships();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }

    /**
     * Create the world championship data
     */
    private function createWorldChampionships(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => '01-11-2022',
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Azerbaijan')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Baku')->first()->id,
                'date' => '01-11-2021',
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Japan')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Tokyo')->first()->id,
                'date' => '01-11-2019',
                'track' => 'Spieth',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'St. Petersburg')->first()->id,
                'date' => '01-11-2018',
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => '01-11-2017',
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => '01-11-2015',
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'United States')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Daytona')->first()->id,
                'date' => '01-11-2014',
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => '01-11-2013',
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'England')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Birmingham')->first()->id,
                'date' => '01-11-2011',
                'track' => 'Gymnova',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'France')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Metz')->first()->id,
                'date' => '01-11-2010',
                'track' => 'Gymnova',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'St. Petersburg')->first()->id,
                'date' => '01-11-2009',
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Canada')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Quebec')->first()->id,
                'date' => '01-11-2007',
                'track' => 'Jansen & Fritzen',
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Netherlands')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Eindhoven')->first()->id,
                'date' => '01-11-2005',
                'track' => null,
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Germany')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Hanover')->first()->id,
                'date' => '01-11-2003',
                'track' => null,
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => '01-11-2001',
                'track' => null,
                'type' => EventType::INTERNATIONAL
            ],
            [
                'name' => 'World Championship',
                'country_id' => DB::table('countries')->where('name', 'South Africa')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sun City')->first()->id,
                'date' => '01-11-1999',
                'track' => null,
                'type' => EventType::INTERNATIONAL
            ]
        ]);
    }
};
