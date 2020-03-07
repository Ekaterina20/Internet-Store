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
            //создание поля для связывания с таблицей categories
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->float('price');
            $table->text('short_des'); //описание
            $table->timestamps();

            //создание внешнего ключа для поля 'category_id',
            // который связан с полем id таблицы 'categories'
            $table->foreign('category_id')
                ->references ('id')
                ->on('categories')
                ->onDelete('cascade');//удалит дочерние записи тоже при удалении родит
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
