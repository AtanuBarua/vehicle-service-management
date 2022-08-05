<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotQuestionsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('bot_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->tinyInteger('defaultAnswer')->default(0);
            $table->unsignedBigInteger('answer_id');
            $table->timestamps();
            
            $table->foreign('answer_id')
            ->references('id')->on('bot_answers')
            ->onDelete('cascade');
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('bot_questions');
    }
}