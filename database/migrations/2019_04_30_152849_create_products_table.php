<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sales_price')->nullable();
            $table->text('ad_text')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->boolean('live')->default(true);
            $table->enum('availability', ['instock', 'out-of-stock', 'pre-order', 'coming-soon'])->default('instock');
            $table->timestamp('publish_at');
            $table->timestamp('sale_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
