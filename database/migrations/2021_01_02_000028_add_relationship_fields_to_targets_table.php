<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTargetsTable extends Migration
{
    public function up()
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->unsignedBigInteger('target_category_id');
            $table->foreign('target_category_id', 'target_category_fk_2896462')->references('id')->on('target_categories');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_2896463')->references('id')->on('currencies');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2896467')->references('id')->on('teams');
            $table->unsignedBigInteger('account_from_id')->nullable();
            $table->foreign('account_from_id', 'account_from_fk_2897789')->references('id')->on('accounts');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2897790')->references('id')->on('users');
        });
    }
}
