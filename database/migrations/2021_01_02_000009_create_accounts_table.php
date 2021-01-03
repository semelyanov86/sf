<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('state');
            $table->longText('description')->nullable();
            $table->integer('start_balance');
            $table->integer('market_value');
            $table->string('extra_prefix')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
