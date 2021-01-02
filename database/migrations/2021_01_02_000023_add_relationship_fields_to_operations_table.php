<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOperationsTable extends Migration
{
    public function up()
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->unsignedBigInteger('source_account_id')->nullable();
            $table->foreign('source_account_id', 'source_account_fk_2897773')->references('id')->on('accounts');
            $table->unsignedBigInteger('to_account_id')->nullable();
            $table->foreign('to_account_id', 'to_account_fk_2897774')->references('id')->on('accounts');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_2897776')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2897778')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2897788')->references('id')->on('teams');
        });
    }
}
