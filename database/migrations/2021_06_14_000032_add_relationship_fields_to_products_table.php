<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_categorie_id')->nullable();
            $table->foreign('product_categorie_id', 'product_categorie_fk_4163935')->references('id')->on('product_categories');
        });
    }
}
