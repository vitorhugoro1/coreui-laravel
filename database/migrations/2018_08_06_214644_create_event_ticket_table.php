<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('event_id');
            $table->timestamp('open_date')->nullable();
            $table->timestamp('close_date')->nullable();
            $table->boolean('is_free');
            $table->integer('quantity')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->json('options')->nullable();
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
        Schema::dropIfExists('event_ticket');
    }
}
