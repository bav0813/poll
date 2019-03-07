<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters_infos', function (Blueprint $table) {
            $table->foreign('candidate_id')
                ->references('id')->on('candidates')
                ->onDelete('cascade');
            $table->increments('id');
            $table->string ('phone',20);
            $table->unsignedInteger ('candidate_id')->unsigned();
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
        Schema::dropIfExists('voters_infos');
    }
}
