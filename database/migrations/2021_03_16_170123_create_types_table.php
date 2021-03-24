<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_parts_id')->nullable();
            $table->unsignedBigInteger('computer_equipment_id')->nullable();
            $table->string('computer_parts_type')->nullable();
            $table->string('computer_equipment_type')->nullable();
            $table->timestamps();

            $table->foreign('computer_parts_id')->references('id')->on('computer_parts')->onDelete('cascade');
            $table->foreign('computer_equipment_id')->references('id')->on('computer_equipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
