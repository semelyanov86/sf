<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type')->nullable();
            $table->boolean('is_hidden')->default(0)->nullable();
            $table->integer('parent')->nullable();
            $table->integer('sys_category')->nullable();
            $table->datetime('last_used_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
