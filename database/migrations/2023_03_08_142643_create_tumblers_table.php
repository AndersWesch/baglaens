<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gender;

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumblers');
    }
};
