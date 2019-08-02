<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image_path');
            $table->string('description');
            $table->integer('no_of_votes')->default(0);
            $table->integer('avg_vote')->default(0);
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
        Schema::dropIfExists('cakes');
    }
}
