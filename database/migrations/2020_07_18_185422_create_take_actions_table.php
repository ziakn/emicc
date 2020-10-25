<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('articulate_id');
            $table->text('saturday')->Nullable();
            $table->text('sunday')->Nullable();
            $table->text('monday')->Nullable();
            $table->text('tuesday')->Nullable();
            $table->text('wednesday')->Nullable();
            $table->text('thursday')->Nullable();
            $table->text('friday')->Nullable();
            $table->text('repeattask')->Nullable();
            $table->string('date')->Nullable();
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
        Schema::dropIfExists('take_actions');
    }
}
