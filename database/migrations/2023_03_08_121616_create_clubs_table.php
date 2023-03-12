<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->timestamps();
        });

        $denmarkId = DB::table('countries')->where('name', 'Denmark')->first()->id;

        DB::table('clubs')->insert([
            [
                'name' => 'Odense Gymnastik Forening',
                'short' => 'OGF',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Odense')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Vestjysk Gymnastik Forening',
                'short' => 'VGF89',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Holstebro')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Silkeborg Pigerne & Drengene',
                'short' => 'SPD',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Silkeborg')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Outrup',
                'short' => 'GUB',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Outrup')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Svendborg Gymnastik Forening',
                'short' => 'SG',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Svendborg')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Flemming Efterskole Gymnastik Forening',
                'short' => 'FEG',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Flemming')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Haslev Gymnastik Forening',
                'short' => 'HGF',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Haslev')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Varnæs Bovrup Idræts Forening',
                'short' => 'VBIF',
                'country_id' => $denmarkId,
                'city_id' => DB::table('cities')->where('name', 'Varnæs Bovrup')->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
