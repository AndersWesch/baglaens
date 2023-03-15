<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EventType;
use Carbon\Carbon;

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

            $table->integer('junior')->default(0);

            $table->timestamps();
        });

        $this->createWorldChampionships();
        $this->createEuropeanChampionships();
        $this->createDanishChampionships();
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
                'name' => 'World Championship 2022',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2022'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2021',
                'country_id' => DB::table('countries')->where('name', 'Azerbaijan')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Baku')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2021'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2019',
                'country_id' => DB::table('countries')->where('name', 'Japan')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Tokyo')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2019'),
                'track' => 'Spieth',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2018',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'St. Petersburg')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2018'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2017',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2017'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2015',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2015'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2014',
                'country_id' => DB::table('countries')->where('name', 'United States')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Daytona')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2014'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2013',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sofia')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2013'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2011',
                'country_id' => DB::table('countries')->where('name', 'England')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Birmingham')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2011'),
                'track' => 'Gymnova',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2010',
                'country_id' => DB::table('countries')->where('name', 'France')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Metz')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2010'),
                'track' => 'Gymnova',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2009',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'St. Petersburg')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2009'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2007',
                'country_id' => DB::table('countries')->where('name', 'Canada')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Quebec')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2007'),
                'track' => 'Jansen & Fritzen',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2005',
                'country_id' => DB::table('countries')->where('name', 'Netherlands')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Eindhoven')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2005'),
                'track' => null,
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2003',
                'country_id' => DB::table('countries')->where('name', 'Germany')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Hanover')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2003'),
                'track' => null,
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 2001',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-2001'),
                'track' => null,
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'World Championship 1999',
                'country_id' => DB::table('countries')->where('name', 'South Africa')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sun City')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y',  '01-11-1999'),
                'track' => null,
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }

    /**
     * Create all the european championships
     */
    private function createEuropeanChampionships(): void
    {
         DB::table('events')->insert([
            [
                'name' => 'European Championship 2021',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Sochi')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2021'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2018',
                'country_id' => DB::table('countries')->where('name', 'Azerbaijan')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Baku')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2018'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2016',
                'country_id' => DB::table('countries')->where('name', 'Spain')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Valladolid')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2016'),
                'track' => 'Skakun',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2014',
                'country_id' => DB::table('countries')->where('name', 'Portugal')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Guimaraes')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2014'),
                'track' => 'Gymnova',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2012',
                'country_id' => DB::table('countries')->where('name', 'Russia')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'St. Petersburg')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2012'),
                'track' => 'Acrosport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2010',
                'country_id' => DB::table('countries')->where('name', 'Bulgaria')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Varna')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2010'),
                'track' => 'Spieth',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'European Championship 2008',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2008'),
                'track' => 'Spieth',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'European Championship 2006',
                'country_id' => DB::table('countries')->where('name', 'France')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Metz')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2006'),
                'track' => 'NouanSport',
                'type' => EventType::INTERNATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    /**
     * Create all the danish championships
     */
    private function createDanishChampionships(): void
    {
         DB::table('events')->insert([
            [
                'name' => 'Danish Championship 2022',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2022'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2021',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2021'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2020',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2020'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2019',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2019'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2018',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2018'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2017',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2017'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2016',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2016'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2015',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2015'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2014',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2014'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2013',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2013'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2012',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2012'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2011',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2011'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2010',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2010'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2009',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2009'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2008',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2008'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2007',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2007'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2006',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2006'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2005',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2005'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2004',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2004'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Danish Championship 2003',
                'country_id' => DB::table('countries')->where('name', 'Denmark')->first()->id,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'date' => Carbon::createFromFormat('d-m-Y', '01-11-2003'),
                'track' => '',
                'type' => EventType::NATIONAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
};
