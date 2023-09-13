<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpansesTable extends Migration
{
    public function up()
    {
        Schema::table('expanses', function (Blueprint $table) {
            $table->unsignedBigInteger('expensecategory_id');
            $table->foreign('expensecategory_id', 'expensecategory_fk_4164042')->references('id')->on('expense_categories');
        });
    }
}
