<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{

    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->default('Nebras');
            $table->string('name_en')->default('نبراس');
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('media');
    }
}
