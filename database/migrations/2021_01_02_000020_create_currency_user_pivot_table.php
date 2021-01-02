<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('currency_user', function (Blueprint $table) {
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_id_fk_2895918')->references('id')->on('currencies')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_2895918')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
