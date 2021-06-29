<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
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
            $table->string('name',255);
            $table->string('slug',300);
            $table->text('description');
            $table->string('short_description',555);
            $table->decimal('price',12,2);
            $table->decimal('discount',12,2);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('user_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('views')->default(0);
            $table->string('meta_title',255);
            $table->string('meta_keywords',355);
            $table->string('meta_description',555);
            $table->integer('stock')->default(0);
            $table->tinyInteger('handle_stock')->default(0);
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
