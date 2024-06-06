<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add the category_id column
            $table->unsignedBigInteger('category_id');

            // Remove the type column
            $table->dropColumn('type');

            // Add foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add the type column back as JSON
            $table->json('type');

            // Remove the category_id column
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
