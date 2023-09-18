<?php

use App\Models\Quote;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // sms frequency
        // (0 - 13) - weekly(monday morning/night - sunday morning/night )
        // (14, 15) - daily morning/night
        // (16, 17) - monthly(first Monday morning/night)
        // 18 - never
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->integer('sms_frequency')->default(1); // default - weekly monday night
            $table->foreignIdFor(Quote::class);
            $table->foreignIdFor(Track::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
