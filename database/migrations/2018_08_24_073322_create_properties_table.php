<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->boolean('featured')->default(false);
            $table->enum('purpose', ['بيع', 'ايجار']);
            $table->string('type'); // ['بيت', 'شقة','ملحق','عمارة','فلل']
            $table->string('image')->nullable();
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->string('city');
            $table->string('city_slug');
            $table->string('address');
            $table->integer('area');
            $table->integer('agent_id');
            $table->text('description');
            $table->string('video')->nullable();
            $table->string('floor_plan')->nullable();

            //for excel inserting
            $table->string('coordinate')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('halls')->nullable();
            $table->integer('entries')->nullable();
            $table->string('furnished')->nullable();
            $table->string('mroom')->nullable();
            $table->string('droom')->nullable();
            $table->string('status')->nullable();
            $table->string('parking')->nullable();
            $table->string('tank')->nullable();
            $table->string('sale')->nullable();
            $table->string('location')->nullable();

            
            // $table->string('location_latitude');
            // $table->string('location_longitude');
            // $table->text('nearby')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
