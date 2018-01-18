<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('item_desc', 2500);
            $table->string('item_add_desc', 2500)->default(NULL);
            $table->string('item_image_url')->default(NULL);
            $table->integer('item_on_warehouse');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->double('price_manufac');
            $table->double('price_display');
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
        Schema::dropIfExists('items');
    }
}
