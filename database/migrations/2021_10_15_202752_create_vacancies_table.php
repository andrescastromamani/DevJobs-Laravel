<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('experience_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('salary_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('experience_id')->references('id')->on('experiences');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('salary_id')->references('id')->on('salaries');
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
        Schema::dropIfExists('vacancies');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('salaries');
    }
}
