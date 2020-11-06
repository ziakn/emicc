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
            $table->text('notification')->Nullable();
            $table->text('actionstatus')->Nullable();
            $table->text('ringtone')->Nullable();
            $table->text('notification_frequency')->Nullable();
            $table->text('repeat_flag')->Nullable();
            $table->text('repeattask')->Nullable();
            $table->text('time')->Nullable();
            $table->string('action_date')->Nullable();
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
