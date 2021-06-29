<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcommerceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',300);
            $table->integer('parent_id')->default(0);
            $table->integer('total_products')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('ecommerce_category');
    }
}
