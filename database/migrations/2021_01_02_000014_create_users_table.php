<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('login')->nullable()->unique();
            $table->integer('operations_number')->nullable();
            $table->integer('budget_day_start')->nullable();
            $table->integer('primary_currency')->nullable();
            $table->string('timezone')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('google_sync')->default(0)->nullable();
            $table->boolean('email_notify')->default(0)->nullable();
            $table->string('mail_days_before')->nullable();
            $table->time('mail_time')->nullable();
            $table->boolean('sms_notify')->default(0)->nullable();
            $table->string('sms_days_before')->nullable();
            $table->time('sms_time')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
