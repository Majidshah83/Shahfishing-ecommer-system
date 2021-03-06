<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('categorie_id');
           $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string('name',255);
            $table->integer('quantity');
            $table->string('description',255);
            $table->float('price');
            $table->integer('sku');
            $table->integer('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
