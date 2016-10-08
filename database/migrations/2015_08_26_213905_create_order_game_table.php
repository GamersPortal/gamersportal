;<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_game', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->integer('game_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->float('price', 8, 2);

            $table->timestamps();

            /**
             * Indices
             */
            $table->foreign('order_id')
                ->references('id')->on('orders');

            $table->foreign('game_id')
                ->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_game');
    }
}
