<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titel');
            $table->string('barcode');
            $table->longText('description')->nullable();
            $table->decimal('sell_price', 15, 2);
            $table->decimal('buy_price', 15, 2);
            $table->integer('quantity');
            $table->integer('loyal_points')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
