<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gender;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');

            $table->string('name');

            $table->string('gender', 16);
            $table->foreign('gender')->references('gender')->on('genders');

            $table->string('video_url')->nullable();

            $table->timestamps();
        });

        $this->seedWorldChampionships();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }

    private function seedWorldChampionships(): void
    {
        $worlds = DB::table('events')->where('name', 'World Championship')->get();
        foreach ($worlds as $event) {
            DB::table('competitions')->insert([
                [
                    'event_id' => $event->id,
                    'name' => 'Mens Prelims',
                    'gender' => Gender::MALE,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'event_id' => $event->id,
                    'name' => 'Mens Final',
                    'gender' => Gender::MALE,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'event_id' => $event->id,
                    'name' => 'Womens Prelims',
                    'gender' => Gender::FEMALE,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'event_id' => $event->id,
                    'name' => 'Womens Final',
                    'gender' => Gender::FEMALE,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]);
        }
    }
};
