<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->foreign('account_type_id', 'account_type_fk_2896480')->references('id')->on('account_types');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_2896484')->references('id')->on('currencies');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_2896485')->references('id')->on('banks');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2896488')->references('id')->on('teams');
        });
    }
}
