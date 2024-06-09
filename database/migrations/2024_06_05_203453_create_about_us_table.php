<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->json('about_title')->nullable();
            $table->json('about_sub_title')->nullable();
            $table->json('about_description')->nullable();
            $table->json('manager_name')->nullable();
            $table->json('manager_position')->nullable();
            $table->string('company_katalog')->nullable(); // Update this line
            $table->json('about_banner_text')->nullable();
            $table->json('mission_title')->nullable();
            $table->json('mission_sub_title')->nullable();
            $table->json('mission_description')->nullable();
            $table->json('vision_title')->nullable();
            $table->json('vision_description')->nullable();
            $table->json('quality_title')->nullable();
            $table->json('quality_description')->nullable();
            $table->json('seo_description')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
