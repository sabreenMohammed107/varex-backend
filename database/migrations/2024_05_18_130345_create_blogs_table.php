<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('slug')->nullable();
            $table->json('type')->nullable();
            $table->date('publish_date')->nullable();
            $table->string('main_image')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('description')->nullable();
            $table->boolean('master')->default(false);
            $table->integer('active')->default(1);
            $table->integer('featured')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
