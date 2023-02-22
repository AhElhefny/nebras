<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{

    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('review_en');
            $table->text('review_ar');
            $table->tinyInteger('reviews')->default(0);
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('job_ar');
            $table->string('job_en');
            $table->string('image')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
