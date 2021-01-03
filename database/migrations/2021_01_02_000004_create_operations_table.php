<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->date('done_at');
            $table->string('type');
            $table->longText('description')->nullable();
            $table->longText('related_transactions')->nullable();
            $table->integer('cal_repeat')->nullable();
            $table->boolean('google_sync')->default(0)->nullable();
            $table->boolean('remind_operation')->default(0)->nullable();
            $table->boolean('is_calendar')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
