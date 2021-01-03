<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('target_type')->nullable();
            $table->string('target_name');
            $table->string('target_status');
            $table->integer('amount');
            $table->date('first_pay_date')->nullable();
            $table->integer('monthly_pay_amount')->nullable();
            $table->date('pay_to_date')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('target_is_done')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
