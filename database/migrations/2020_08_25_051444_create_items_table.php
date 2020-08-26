<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
            $table->string('code',10);
            $table->string('name', 150);
            $table->string('brand', 150);
            $table->string('purchase_year', 50);
            $table->boolean('is_include_pc')->default(1)->index();
            $table->boolean('is_include_monitor')->default(1)->index();
            $table->boolean('is_include_keyboard')->default(1)->index();
            $table->boolean('is_include_headset')->default(1)->index();
            $table->string('origin', 200);
            $table->string('acceptance_year', 200);
            $table->unsignedInteger('quantity');
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
