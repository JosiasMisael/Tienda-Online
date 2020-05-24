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
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->decimal('actual_price',12,2)->default(0);
            $table->decimal('previous_price',12,2)->default(0);
            $table->unsignedInteger('discount')->default(0);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('specification')->nullable();
            $table->text('date_of_interest');
            $table->unsignedBigInteger('view')->default(0);
            $table->unsignedBigInteger('sales')->default(0);
            $table->string('product_status');
            $table->boolean('status')->default(1);
            $table->boolean('slider');
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
