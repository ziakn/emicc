<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('articulate_id');
            $table->text('arta1')->Nullable();
            $table->text('arta2')->Nullable();
            $table->text('arta3')->Nullable();
            $table->text('artb1')->Nullable();
            $table->text('artb2')->Nullable();
            $table->text('artb3')->Nullable();
            $table->text('artc1')->Nullable();
            $table->text('artc2')->Nullable();
            $table->text('artc3')->Nullable();
            $table->date('date')->Nullable();
            $table->tinyInteger('status')->default(1)->comment('0,1,2,3');
            $table->softDeletes();
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
        Schema::dropIfExists('comunicates');
    }
}
