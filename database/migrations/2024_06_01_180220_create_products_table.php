<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('home_title');
            $table->json('title');
            $table->json('description');
            $table->text('featured_text_ar')->nullable();
            $table->text('featured_text_en')->nullable();
            $table->string('video_link')->nullable();
            $table->string('main_image')->nullable();
            $table->string('fully_qr_image')->nullable();
            $table->string('qr_image')->nullable();
            $table->json('tags')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->integer('rank')->default(0);
            $table->boolean('popular')->default(false);
            $table->boolean('slider')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('best_selling')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
