<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            /**
             * Basic game info
             */
            $table->increments('id');

            // Active in store
            $table->boolean('active')->default(false);

            // New label
            $table->boolean('new')->default(false);

            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->integer('category_id')->unsigned()->nullable();
            $table->text('description');
            $table->string('image')->nullable()->default('img/game-no-image.jpg');
            $table->string('image_thumb')->nullable()->default('img/game-no-image.jpg');


            $table->timestamps();

            /**
             * Indices and keys
             */
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('games');
    }

}
