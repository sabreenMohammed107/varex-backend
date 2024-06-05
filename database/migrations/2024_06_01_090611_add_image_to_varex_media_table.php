<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToVarexMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('varex_media', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add the new image field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('varex_media', function (Blueprint $table) {
            $table->dropColumn('image'); // Remove the image field if rolled back
        });
    }
}
