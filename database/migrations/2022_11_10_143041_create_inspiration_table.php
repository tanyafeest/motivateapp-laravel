<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspiration', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string("album_name")->nullable();
            $table->string("album_herf")->nullable();
            $table->foreignId("sharedby_user_id")->constrained("users");
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
        Schema::dropIfExists('inspiration');
    }
};
