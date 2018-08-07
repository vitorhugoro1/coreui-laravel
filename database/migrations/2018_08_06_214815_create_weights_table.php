<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->decimal('min', 8, 2);
            $table->decimal('max', 8, 2);
            $table->string('gender');
            $table->boolean('has_team');
            $table->boolean('has_age_bracket');
            $table->boolean('has_weapon');
            $table->json('team')->nullable();
            $table->json('age_bracket')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weights');
    }
}
