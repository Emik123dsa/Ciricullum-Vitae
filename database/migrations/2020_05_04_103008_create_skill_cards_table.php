<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 55);
            $table->string('name', 55);
            $table->text('img');
            $table->string('color', 155);
            $table->text('link', 255);
            $table->string('parent', 55);
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
        Schema::dropIfExists('skill_cards');
    }
}
