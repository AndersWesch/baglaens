<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gender;
use App\Models\Club;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tumblers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->timestamp('birthday')->nullable();

            $table->string('gender', 16);
            $table->foreign('gender')->references('gender')->on('genders');

            $table->string('instragram_link')->nullable();
            $table->string('sampler_link')->nullable();

            $table->timestamps();
        });

        Schema::create('club_tumbler', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs');

            $table->unsignedBigInteger('tumbler_id');
            $table->foreign('tumbler_id')->references('id')->on('tumblers');

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

            $table->timestamps();
        });

        $denmarkId = DB::table('countries')->where('name', 'Denmark')->first()->id;
        DB::table('tumblers')->insert([
            [
                'first_name' => 'Anders',
                'last_name' => 'Wesch',
                'country_id' => $denmarkId,
                'birthday' => '11-10-1993',
                'gender' => Gender::MALE,
                'instragram_link' => 'https://www.instagram.com/anderswesch/',
                'sampler_link' => 'https://www.youtube.com/watch?v=kYMpLQxjrNY'
            ]
        ]);

        foreach ($this->getTumblers() as $tumbler) {
            $tumblerId = DB::table('tumblers')->insertGetId([
                'first_name' => $tumbler['first_name'],
                'last_name' => $tumbler['last_name'],
                'country_id' => $denmarkId,
                'birthday' => $tumbler['birtday'],
                'gender' => strtolower($tumbler['gender']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $clubShorts = explode('/', $tumbler['club']);

            foreach ($clubShorts as $short) {
                if ($short == ""){
                    continue;
                }

                DB::table('club_tumbler')->insert([
                    [
                        'club_id' => Club::where('short', $short)->first()->id,
                        'tumbler_id' => $tumblerId,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumblers');
        Schema::dropIfExists('club_tumbler');
    }

    private function getTumblers(): array
    {
        return [
            [
                'first_name' => 'Adam',
                'last_name' => 'Scharf Matthiesen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '18-11-1996',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Lasse',
                'last_name' => 'Pihl',
                'country' => 'Danmark',
                'club' => 'OGF/VGF89',
                'birtday' => '01-01-1989',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Martin',
                'last_name' => 'Abildgaard',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-2002',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Johannes',
                'last_name' => 'Sømod',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1998',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Jeppe',
                'last_name' => 'Mikkelsen',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-2005',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Mads',
                'last_name' => 'Hansen',
                'country' => 'Danmark',
                'club' => 'OGF/SPD',
                'birtday' => '01-01-2003',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Rasmus',
                'last_name' => 'Steffensen',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-1999',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Magnus',
                'last_name' => 'Lindholmer',
                'country' => 'Danmark',
                'club' => 'SG/OGF',
                'birtday' => '01-01-2003',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Rasmus',
                'last_name' => 'Beck',
                'country' => 'Danmark',
                'club' => 'VGF89/OGF',
                'birtday' => '01-01-1998',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Erbs',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1999',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Elias',
                'last_name' => 'Green',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1998',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Rasmus',
                'last_name' => 'Gaarde',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-1996',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Magnus',
                'last_name' => 'Eskesen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1995',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Tobias',
                'last_name' => 'Hulgaard',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1990',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Oliver',
                'last_name' => 'Termansen',
                'country' => 'Danmark',
                'club' => 'GUB',
                'birtday' => '01-01-1996',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Johan',
                'last_name' => 'Hvidemose',
                'country' => 'Danmark',
                'club' => 'HGF/OGF',
                'birtday' => '01-01-1995',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Mikael',
                'last_name' => 'Nissen',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1992',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Peter',
                'last_name' => 'Ulrich Rasmussen',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1991',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Jacob',
                'last_name' => 'Snogdal',
                'country' => 'Danmark',
                'club' => 'SG/OGF',
                'birtday' => '01-01-1989',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Jensen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1989',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Jonas',
                'last_name' => 'Green',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1987',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Rye',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1989',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Alexander',
                'last_name' => 'Andreasen',
                'country' => 'Danmark',
                'club' => '',
                'birtday' => '01-01-1986',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Oskar',
                'last_name' => 'Post',
                'country' => 'Danmark',
                'club' => 'VBIF/OGF',
                'birtday' => '01-01-2004',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Simon',
                'last_name' => 'Boesdal',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-2004',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Asbjørn',
                'last_name' => 'Sømod',
                'country' => 'Danmark',
                'club' => 'SG/OGF',
                'birtday' => '01-01-2003',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Alexander',
                'last_name' => 'Bredvig',
                'country' => 'Danmark',
                'club' => 'GUB/OGF/SPD',
                'birtday' => '01-01-2000',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Christoffer',
                'last_name' => 'Scherrebeck',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-1999',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Kristoffer',
                'last_name' => 'Krüger',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-1997',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Morten',
                'last_name' => 'Sørensen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1997',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Jeppe',
                'last_name' => 'Tvedebrink',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1997',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Albert',
                'last_name' => 'Klostergaard',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1996',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Christoffer',
                'last_name' => 'Søgård',
                'country' => 'Danmark',
                'club' => 'GUB',
                'birtday' => '01-01-1994',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Steven',
                'last_name' => 'Nash',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '01-01-1991',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Kasper',
                'last_name' => 'Møller',
                'country' => 'Danmark',
                'club' => 'SG',
                'birtday' => '01-01-1993',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Frederik',
                'last_name' => 'Bækhøj',
                'country' => 'Danmark',
                'club' => 'GUB/SPD',
                'birtday' => '01-01-2005',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Frederik',
                'last_name' => 'Jørgensen',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-2005',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Oliver',
                'last_name' => 'Krejberg',
                'country' => 'Danmark',
                'club' => 'SPD',
                'birtday' => '01-01-2005',
                'gender' => 'Male'
            ],
            [
                'first_name' => 'Johanne',
                'last_name' => 'Nørby',
                'country' => 'Danmark',
                'club' => 'SG/OGF',
                'birtday' => '01-01-1992',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'Ørskov',
                'country' => 'Danmark',
                'club' => 'GUB',
                'birtday' => '01-01-1998',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Victoria',
                'last_name' => 'Thomsen',
                'country' => 'Danmark',
                'club' => 'GUB',
                'birtday' => '01-01-2003',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'La Cour',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-1999',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Ida',
                'last_name' => 'Pagård',
                'country' => 'Danmark',
                'club' => 'GUB/OGF',
                'birtday' => '01-01-1997',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Katrine',
                'last_name' => 'Møller',
                'country' => 'Danmark',
                'club' => 'SG/OGF',
                'birtday' => '01-01-1999',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Anne Sofie',
                'last_name' => 'Okkerstrøm',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '08-06-1997',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Anne-Sofie',
                'last_name' => 'Juhl',
                'country' => 'Danmark',
                'club' => 'VGF89',
                'birtday' => '21-07-1997',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Josefine',
                'last_name' => 'Scherrebeck',
                'country' => 'Danmark',
                'club' => 'FEG/SPD',
                'birtday' => '01-01-2003',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Julie',
                'last_name' => 'Jensen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-2004',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Olivia',
                'last_name' => 'Madsen',
                'country' => 'Danmark',
                'club' => 'OGF',
                'birtday' => '01-01-2006',
                'gender' => 'Female'
            ],
            [
                'first_name' => 'Sola',
                'last_name' => 'Thomsen',
                'country' => 'Danmark',
                'club' => 'GUB',
                'birtday' => '01-01-2006',
                'gender' => 'Female'
            ]
        ];
    }
};

