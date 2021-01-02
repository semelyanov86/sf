<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('target_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('target_category_name');
            $table->string('target_category_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
