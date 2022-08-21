<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->boolean('is_active')->default(1);
            $table->integer('product_type_id');
            $table->integer('product_category_id');
            $table->string('slug');
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('image');
            $table->boolean('is_new')->default(0);
            $table->boolean('is_bestseller')->default(0);
            $table->integer('offer_price')->nullable();
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
};
