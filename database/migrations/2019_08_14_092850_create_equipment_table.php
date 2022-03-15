<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category');
            $table->integer('amount');
            $table->date('purchased_date');
            $table->integer('value');
            $table->integer('unit_value');
            $table->mediumText('description');
            $table->integer('barcode number');
            $table->longText('barcode desc');
            $table->string('equipment_type');
            $table->string('usable_status');
            $table->boolean('use_instance');
            $table->string('brand');

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
        Schema::dropIfExists('equipment');
    }
}
