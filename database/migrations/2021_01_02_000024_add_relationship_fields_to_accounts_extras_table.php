<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountsExtrasTable extends Migration
{
    public function up()
    {
        Schema::table('accounts_extras', function (Blueprint $table) {
            $table->unsignedBigInteger('card_type_id')->nullable();
            $table->foreign('card_type_id', 'card_type_fk_2897572')->references('id')->on('card_types');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2897583')->references('id')->on('teams');
            $table->unsignedBigInteger('auto_brand_id')->nullable();
            $table->foreign('auto_brand_id', 'auto_brand_fk_2897759')->references('id')->on('auto_brands');
        });
    }
}
