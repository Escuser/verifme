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
            $table->string('seller_id')->nullable();
            $table->string('type')->nullable();
            $table->text('title')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('delivery_period')->nullable();
            $table->string('status')->nullable();
            $table->mediumText('public_data')->nullable();
            $table->mediumText('private_data')->nullable();
            $table->string('price')->nullable();
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
