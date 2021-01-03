<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHiddenCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('hidden_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_2905638')->references('id')->on('categories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_2905639')->references('id')->on('users');
        });
    }
}
