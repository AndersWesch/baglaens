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
        Schema::create('passes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tumbler_id');
            $table->foreign('tumbler_id')->references('id')->on('tumblers');

            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id')->references('id')->on('competitions');

            $table->string('pass');
            $table->tinyInteger('pass_order')->default(1)->comment('the order of the passes either 1 or 2');

            $table->integer('place')->nullable();

            $table->double('execution')->nullable();
            $table->double('difficulty')->nullable();
            $table->double('total_score')->nullable();

            $table->string('video_url');

            $table->timestamps();
        });

        $andersWesch = 1;
        $worlds17final = 19;

        DB::table('passes')->insert([
            [
                'tumbler_id' => $andersWesch,
                'competition_id' => $worlds17final,
                'pass' => '( F 22/ ^ ^ ^ F 44/',
                'pass_order' => 1,
                'place' => 2,
                'execution' => 8.9,
                'difficulty' => 10.9,
                'total_score' => 39.9,
                'video_url' => '/'
            ],
            [
                'tumbler_id' => $andersWesch,
                'competition_id' => $worlds17final,
                'pass' => '( 22/ ^ F --/ ^ F ---o',
                'pass_order' => 2,
                'place' => 2,
                'execution' => 8.9,
                'difficulty' => 10.9,
                'total_score' => 39.9,
                'video_url' => '/'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passes');
    }
};
