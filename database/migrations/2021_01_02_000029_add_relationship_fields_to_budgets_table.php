<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBudgetsTable extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_2896454')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2896456')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2896460')->references('id')->on('teams');
        });
    }
}
