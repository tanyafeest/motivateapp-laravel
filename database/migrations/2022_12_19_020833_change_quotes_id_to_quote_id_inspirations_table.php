<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspirations', function (Blueprint $table) {
            $table->renameColumn('quotes_id', 'quote_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspirations', function (Blueprint $table) {
            $table->renameColumn('quote_id', 'quotes_id');
        });
    }
};
