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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('isSentTwoStepAuth', 'is_sent_two_step_auth');
            $table->renameColumn('isSharingGuidance', 'is_sharing_guidance');

            // add oauth_type
            $table->string('oauth_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('is_sent_two_step_auth', 'isSentTwoStepAuth');
            $table->renameColumn('is_sharing_guidance', 'isSharingGuidance');

            // add oauth_type
            $table->removeColumn('oauth_type');
        });
    }
};
